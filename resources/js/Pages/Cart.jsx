import { Link } from "@inertiajs/react";
import React, { useState, useEffect } from "react";

const Cart = ({ cart }) => {
  console.log("🚀 ~ file: Cart.jsx:4 ~ Cart ~ cart:", cart);
  const [cartItems, setCartItems] = useState([]);
  const [totalAmount, setTotalAmount] = useState(0);
  const tva = totalAmount.toFixed(2) * 0.12;
  const ttc = totalAmount + tva;

  useEffect(() => {
    setCartItems(cart);
    setTotalAmount(calculateTotalAmount(cart));
  }, []);

  const calculateTotalAmount = (items) => {
    return items.reduce((total, item) => total + Number(item.product.price), 0);
  };

  // const deleteProduct = (id) => {
  //   fetch("/cart/delete", {
  //     method: "DELETE",
  //     headers: {
  //       "Content-Type": "application/json",
  //       Accept: "application/json",
  //     },
  //     body: JSON.stringify({ id }),
  //   });
  // };

  const deleteProduct = (id) => {
    fetch(`/cart/delete`, {
      method: "DELETE",
      headers: {
        "Content-Type": "application/json",
        Accept: "application/json",
      },
      body: JSON.stringify({ id }),
    })
      .then((response) => response.json())
      .then((data) => {
        console.log(data.message);
        window.location.reload();
      })
      .catch((error) => {
        console.error("Error deleting product:", error);
      });
  };

  return (
    <div className="container mx-auto p-8">
      <h1 className="text-2xl font-bold mb-4">Shopping Cart</h1>

      {cart.length > 0 && (
        <div className="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md absolute top-12 right-2">
          <h2 className="text-xl font-semibold text-gray-900 dark:text-white mb-4 border-b">
            Panier
          </h2>
          <div className="flex items-center justify-between">
            <p className="text-lg  dark:text-white">Nb articles:</p>
            <p className="text-lg dark:text-white">{cart.length}</p>
          </div>
          <div className="flex items-center  justify-between">
            <p className="text-lg  dark:text-white">HT:</p>
            <p className="text-lg dark:text-white">${totalAmount.toFixed(2)}</p>
          </div>
          <div className="flex items-center  justify-between">
            <p className="text-lg  dark:text-white">TVA:</p>
            <p className="text-lg dark:text-white">${tva.toFixed(2)}</p>
          </div>
          <div className="flex items-center justify-between">
            <p className="text-lg  dark:text-white">TTC:</p>
            <p className="text-lg dark:text-white"> ${ttc.toFixed(2)}</p>
          </div>
          <div className="flex justify-center p-5 dark:text-white">
            <button className="border-black dark:border-white border p-2 rounded-full">
              Payment
            </button>
          </div>
        </div>
      )}

      {cartItems.length === 0 ? (
        <p>Votre panier est vide.</p>
      ) : (
        <div>
          <ul>
            {cartItems.map((item) => (
              <li
                key={item.product.id}
                className="flex justify-between items-center border-b py-2 w-[75%]"
              >
                <div>
                  <p className="text-lg font-semibold">{item.product.name}</p>
                  <p className="text-gray-500">Prix: ${item.product.price}</p>
                </div>
                <button onClick={() => deleteProduct(item.id)}>Delete</button>
              </li>
            ))}
          </ul>
        </div>
      )}
      <Link href="/products">
        <button className="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 focus:outline-none focus:ring focus:border-gray-300">
          Continuer shopping
        </button>
      </Link>
    </div>
  );
};

export default Cart;
