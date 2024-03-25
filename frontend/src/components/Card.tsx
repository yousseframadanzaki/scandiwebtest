import { ProductTypes,Product } from "../lib/types";
import { formatCurrency } from "../lib/utils";

export function Card({ 
    Product,
    ids,
    handleCheckboxChanged }
    :{
        Product: Product,
        ids:String[],
        handleCheckboxChanged:CallableFunction
    }) {
        
    return (
        <div className="rounded-xl bg-gray-50 px-2 shadow-xl hover:shadow-sm transition duration-500 ease-out">
            <div className="flex justify-between p-3  truncate rounded-xl bg-white  text-xl mt-3">
                <input 
                    type="checkbox" 
                    name="ids[]" 
                    value={Product.id}
                    aria-checked={ids.includes(Product.id)}
                    onClick={(event) => { handleCheckboxChanged(event) }}
                    className="h-4 w-4 delete-checkbox cursor-pointer border-gray-300 bg-gray-100 text-gray-600 focus:ring-2" 
                />
            </div>
            <div className="flex justify-between p-3  truncate rounded-xl bg-white  text-xl mt-3">
                <span className="font-bold text-blue-800">Name</span> <span>{Product.name}</span>
            </div>
            <div className="flex justify-between p-3  truncate rounded-xl bg-white  text-xl mt-3">
                <span className="font-bold text-blue-800">Sku</span> {Product.sku}
            </div>
            <div className="flex justify-between p-3  truncate rounded-xl bg-white  text-xl mt-3">
                <span className="font-bold text-blue-800">Price</span> {formatCurrency(Product.price)}
            </div>
            {Product.type === ProductTypes.BOOK &&
                <div className="flex justify-between p-3  truncate rounded-xl bg-white  text-xl mt-3 mb-3">
                    <span className="font-bold text-blue-800">Weight</span> {Product.weight} KG
                </div>
            }
            {Product.type === ProductTypes.DVD &&
                <div className="flex justify-between p-3  truncate rounded-xl bg-white  text-xl mt-3 mb-3">
                    <span className="font-bold text-blue-800">Size</span> {Product.size} MB
                </div>
            }
            {Product.type === ProductTypes.FURNITURE &&
                <div className="flex justify-between p-3  truncate rounded-xl bg-white  text-xl mt-3 mb-3">
                    <span className="font-bold text-blue-800">Dimention</span>
                    {Product.length}x{Product.width}x{Product.height}
                </div>
            }
        </div>
    );
}

export default Card;