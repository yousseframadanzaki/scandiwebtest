export enum ProductTypes {
    FURNITURE='furniture',
    DVD='dvd',
    BOOK='book'
}
export type Product = {
    name: string,
    sku: string,
    id: string,
    price: number,
    type: ProductTypes,
    weight?: string,
    size?: string,
    length?: string,
    width?: string,
    height?: string
}

export type ProductErrors = {
    name?: string,
    sku?: string,
    id?: string,
    price?: string,
    type?: string,
    weight?: string,
    size?: string,
    length?: string,
    width?: string,
    height?: string
}