import React, { useState, useEffect } from "react";

const Cart = () => {
  const [cartItems, setCartItems] = useState([]);
  const [totalAmount, setTotalAmount] = useState(0);

  const productsList = [
    { id: 1, name: "Product 1", price: 20 },
    { id: 2, name: "Product 2", price: 30 },
  ];

  useEffect(() => {
    setCartItems(productsList);
    setTotalAmount(calculateTotalAmount(productsList));
  }, []);

  const calculateTotalAmount = (items) => {
    return items.reduce((total, item) => total + item.price, 0);
  };

  return (
    <div className="container mx-auto p-8">
      <h1 className="text-2xl font-bold mb-4">Shopping Cart</h1>

      {/* {cartItemCount > 0 && (
          <div className="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md absolute top-12 right-2">
            <h2 className="text-xl font-semibold text-gray-900 dark:text-white mb-4">
              Panier
            </h2>
            <ul>
              {cart.map((item) => (
                <li key={item.id}>
                  <p>{item.name}</p>
                  <p>${item.price}</p>
                </li>
              ))}
            </ul>
          </div>
        )} */}

      {cartItems.length === 0 ? (
        <p>Votre panier est vide.</p>
      ) : (
        <div>
          <ul>
            {cartItems.map((item) => (
              <li
                key={item.id}
                className="flex justify-between items-center border-b py-2"
              >
                <div>
                  <p className="text-lg font-semibold">{item.name}</p>
                  <p className="text-gray-500">Prix: ${item.price}</p>
                </div>
              </li>
            ))}
          </ul>

          <div className="mt-4">
            <p className="text-lg font-semibold">
              Montant total: ${totalAmount}
            </p>
          </div>
        </div>
      )}
      <div className="flex justify-center p-5">
        <button className="border-black border p-2 rounded-full">
          Payment
        </button>
      </div>
    </div>
  );
};

export default Cart;
