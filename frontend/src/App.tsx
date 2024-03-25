import React, {  ChangeEventHandler, MouseEventHandler, useEffect, useState } from 'react';
import './App.css';
import Navbar from './components/Navbar';
import ProductsList from './components/ProductsList';
import { Link } from 'react-router-dom';
import { deleteProducts, getProducts } from './lib/api';
import { Product } from './lib/types';

function App() {

  const [ids,setIds] = useState<String[]>([]);

  const [products,setProducts] = useState<Product[]>([]);
	useEffect(() => {
        getProducts().then((data) => setProducts(data));
    }, []);

  const handleCheckboxChanged : ChangeEventHandler = (event:any)=>{
    const checked_id  = event.target.value;
    var updatedIds = [...ids]
    if(event.target.checked){ 
      updatedIds = [...ids,checked_id];
    }else{
      updatedIds.splice(ids.indexOf(checked_id),1);
    }
    setIds(updatedIds);    
  }

  const handleMassDelete : MouseEventHandler = async (event:any) => {
    const status = await deleteProducts(ids);
    if (status === "success") {
      await getProducts().then((data) => {
        setProducts(data)
        setIds([])
      });
    }
  }

  return (
    <div>
      <Navbar title={"Products List"}>
          <Link className="px-6 py-2 text-white transition duration-500 ease-out bg-blue-700 rounded-lg hover:bg-blue-800 hover:ease-in hover:underline" to={"/add-product"}>ADD</Link>
          <button onClick={handleMassDelete} className="px-6 py-2 text-black transition duration-700 ease-out bg-white border border-black rounded-lg hover:bg-red-500 hover:border-transparent hover:text-white  dark:bg-inherit dark:text-white dark:hover:bg-white dark:hover:text-black">
            MASS DELETE
          </button>
      </Navbar>
      <ProductsList products={products} ids={ids} handleCheckboxChanged={handleCheckboxChanged}/>
    </div>
  );
}

export default App;
