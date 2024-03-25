import { Link, useNavigate } from "react-router-dom";
import Navbar from "../components/Navbar";
import { FormEvent, useState } from "react";
import { addProduct } from "../lib/api";
import { ProductErrors } from "../lib/types";

function AddProduct() {

    const [type, setType] = useState('');
    const [errors, setErrors] = useState<ProductErrors>({});
    const navigate = useNavigate();

    const handleAddProductForm = async (e: FormEvent<HTMLFormElement>) => {
        e.preventDefault();
        const formData = new FormData(e.currentTarget);
        const payLoad = Object.fromEntries(formData);
        const response = await addProduct(payLoad);
        if (response.status === "success") {
            navigate('/');
            return;
        }

        setErrors(response.msg);

    }

    return (<div>
        <Navbar title={"Add Product"}>
            <Link to={"/"} className="px-6 py-2 text-black transition duration-700 ease-out bg-white border border-black rounded-lg hover:bg-black hover:border hover:text-white dark:border-white dark:bg-inherit dark:text-white dark:hover:bg-white dark:hover:text-black">
                Cancel
            </Link>
            <button form="product_form" type="submit" className="px-6 py-2 text-white transition duration-500 ease-out bg-blue-700 rounded-lg hover:bg-blue-800 hover:ease-in hover:underline">
                Save
            </button>
        </Navbar>
        <form id="product_form" onSubmit={(e) => handleAddProductForm(e)}>
            <div className="flex-1 rounded-lg bg-gray-50 px-8 py-8 mt-24">
                <div className="w-full">
                    <div>
                        <label
                            className="mb-3  block text-xs font-medium text-gray-900"
                            htmlFor="sku"
                        >
                            SKU
                        </label>
                        <div className="relative">
                            <input
                                className={"form_input " + (errors?.sku ? "!border-red-600" : "")}
                                id="sku"
                                type="text"
                                name="sku"
                                placeholder=""
                            />
                            {errors?.sku &&
                                <p className="text-red-500 font-bold">{errors?.sku}</p>
                            }
                        </div>
                    </div>
                    <div className="mt-4">
                        <label
                            className="mb-3 block text-xs font-medium text-gray-900"
                            htmlFor="name"
                        >
                            Name
                        </label>
                        <div className="relative">
                            <input
                                className={"form_input " + (errors?.name ? "!border-red-600" : "")}
                                id="name"
                                type="text"
                                name="name"
                                placeholder=""
                            />
                            {errors?.name &&
                                <p className="text-red-500 font-bold">{errors?.name}</p>
                            }
                        </div>
                    </div>
                    <div className="mt-4">
                        <label
                            className="mb-3 block text-xs font-medium text-gray-900"
                            htmlFor="price"
                        >
                            Price
                        </label>
                        <div className="relative">
                            <input
                                className={"form_input " + (errors?.price ? "!border-red-600" : "")}
                                id="price"
                                type="text"
                                name="price"
                                placeholder=""
                            />
                            {errors?.price &&
                                <p className="text-red-500 font-bold">{errors?.price}</p>
                            }
                        </div>
                    </div>
                    <div className="mt-4">
                        <label
                            className="mb-3 block text-xs font-medium text-gray-900"
                            htmlFor="productType"
                        >
                            Type
                        </label>
                        <div className="relative">
                            <select onChange={(e) => setType(e.target.value)} name="type" id="productType" className={"form_input " + (errors?.type ? "!border-red-600" : "")}>
                                <option value="">Please select type</option>
                                <option value="dvd">Dvd</option>
                                <option value="book">Book</option>
                                <option value="furniture">Furniture</option>
                            </select>
                            {errors?.type &&
                                <p className="text-red-500 font-bold">{errors?.type}</p>
                            }
                        </div>
                        {type === 'dvd' &&
                            <div className="mt-4">
                                <label
                                    className="mb-3 block text-xs font-medium text-gray-900"
                                    htmlFor="size"
                                >
                                    Size
                                </label>
                                <div className="relative">
                                    <input
                                        className={"form_input " + (errors?.size ? "!border-red-600" : "")}
                                        id="size"
                                        type="text"
                                        name="size"
                                    />
                                    {errors?.size &&
                                        <p className="text-red-500 font-bold">{errors?.size}</p>
                                    }
                                </div>
                            </div>
                        }
                        {type === 'book' &&
                            <div className="mt-4">
                                <label
                                    className="mb-3 block text-xs font-medium text-gray-900"
                                    htmlFor="weight"
                                >
                                    Weight
                                </label>
                                <div className="relative">
                                    <input
                                        className={"form_input " + (errors?.weight ? "!border-red-600" : "")}
                                        id="weight"
                                        type="text"
                                        name="weight"
                                        placeholder=""
                                    />
                                    {errors?.weight &&
                                        <p className="text-red-500 font-bold">{errors?.weight}</p>
                                    }
                                </div>
                            </div>
                        }
                        {type === 'furniture' &&
                            <div>
                                <div className="mt-4">
                                    <label
                                        className="mb-3 block text-xs font-medium text-gray-900"
                                        htmlFor="length"
                                    >
                                        Length
                                    </label>
                                    <div className="relative">
                                        <input
                                            className={"form_input " + (errors?.length ? "!border-red-600" : "")}
                                            id="length"
                                            type="text"
                                            name="length"
                                            placeholder=""
                                        />
                                        {errors?.length &&
                                            <p className="text-red-500 font-bold">{errors?.length}</p>
                                        }
                                    </div>
                                </div>
                                <div className="mt-4">
                                    <label
                                        className="mb-3 block text-xs font-medium text-gray-900"
                                        htmlFor="width"
                                    >
                                        Width
                                    </label>
                                    <div className="relative">
                                        <input
                                            className={"form_input " + (errors?.width ? "!border-red-600" : "")}
                                            id="width"
                                            type="text"
                                            name="width"
                                            placeholder=""
                                        />
                                        {errors?.width &&
                                            <p className="text-red-500 font-bold">{errors?.width}</p>
                                        }
                                    </div>
                                </div>
                                <div className="mt-4">
                                    <label
                                        className="mb-3 block text-xs font-medium text-gray-900"
                                        htmlFor="height"
                                    >
                                        Height
                                    </label>
                                    <div className="relative">
                                        <input
                                            className={(errors?.height ? "!border-red-600" : "") + " form_input"}
                                            id="height"
                                            type="text"
                                            name="height"
                                            placeholder=""
                                        />
                                        {errors?.height &&
                                            <p className="text-red-500 font-bold">{errors?.height}</p>
                                        }
                                    </div>
                                </div>
                            </div>

                        }
                    </div>
                </div>
            </div>
        </form>
    </div>);
}

export default AddProduct;