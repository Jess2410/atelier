import { Link, Head } from "@inertiajs/react";
import { useState } from "react";
import { FaShoppingCart } from "react-icons/fa";

export default function Welcome({ auth, products }) {
  console.log(products, "test produits");

  const [cart, setCart] = useState([]);

  const addCart = (product_id) => {
    const productAdded = products.find((product) => product.id === product_id);
    setCart([...cart, productAdded]);

    //pour faire passer le state 'cart' au back
    fetch(`/cart/add`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        Accept: "application/json",
      },
      body: JSON.stringify({ product_id }),
    });
  };

  const cartItemCount = cart.length;

  return (
    <>
      <Head title="Products" />
      <div className="dark:bg-gray-700 container mx-auto p-8">
        <nav className="flex justify-between items-center mb-8">
          <div className="text-2xl font-bold text-gray-800 dark:text-white">
            GameGlam
          </div>
          <div className="flex items-center relative">
            <FaShoppingCart className="text-gray-600 dark:text-gray-300 text-xl mr-4" />
            {cartItemCount > 0 && (
              <div className=" bg-red-500 text-white text-xs font-semibold rounded-full w-5 h-5 flex items-center justify-center absolute top-3 right-0">
                {cartItemCount}
              </div>
            )}
          </div>
        </nav>
        <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
          {products.map((product) => (
            <div
              key={product.id}
              className="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md"
            >
              <div className="h-40 w-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center rounded-md mb-4">
                <img
                  src="https://via.placeholder.com/150"
                  alt={product.name}
                  className="h-full w-full object-cover rounded-md"
                />
              </div>

              <h2 className="text-xl font-semibold text-gray-900 dark:text-white mb-2">
                {product.name}
              </h2>

              <p className="text-gray-500 dark:text-gray-400 text-sm leading-relaxed mb-2">
                {product.description}
              </p>

              <p className="text-gray-700 dark:text-gray-300 text-lg font-bold mb-2">
                ${product.price}
              </p>

              <button
                onClick={() => addCart(product.id)}
                className="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300"
              >
                Add to Cart
              </button>
            </div>
          ))}
        </div>
      </div>
    </>
  );
}
