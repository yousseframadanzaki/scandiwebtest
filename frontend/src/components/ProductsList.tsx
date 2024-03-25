import { ChangeEventHandler } from "react";
import { Product } from "../lib/types";
import Card from "./Card";

function ProductsList({ids,handleCheckboxChanged,products}:{ids:String[],handleCheckboxChanged:ChangeEventHandler,products:Product[]}) {

    

    return ( <div className="grid gap-6 sm:grid-cols-2 lg:grid-cols-4 mt-20 p-8">
        {products.map((product) => (
            <Card Product={product} ids={ids} key={product.id} handleCheckboxChanged={handleCheckboxChanged} />
        ))}
    </div> );
}

export default ProductsList;