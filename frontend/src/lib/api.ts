import { Product } from "./types";


export async function getProducts() : Promise<Product[]> {
    const res = await fetch("http://localhost/products");
    const data = await res.json();
    
    return data.data;
}

export async function deleteProducts(ids:String[]) : Promise<String> {
    try {
        const res = await fetch("http://localhost/products",{
            method:"DELETE",
            body:JSON.stringify({
                ids
            })
        });
        const data = await res.json();
        return data.status;
    } catch (error) {
        console.log(error);
    }
    
    return "";
}

export async function addProduct(product:any) : Promise<any> {
    try {
        
        const res = await fetch("http://localhost/products",{
            method:"POST",
            body:JSON.stringify(product)
        });
        const data = await res.json();
        return data;
    } catch (error) {
        console.log(error);
    }
    
    return {error:"server error"};
}