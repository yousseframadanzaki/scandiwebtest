import {  ReactNode } from "react";

function Navbar({title,children}:{children?:ReactNode,title:String}) {
    return ( <nav className="navbar">
        <div className="flex justify-between p-4">
            <div className="title">{title}</div>
            <div className="flex items-center space-x-4 text-lg font-semibold tracking-tight">
                {children}
            </div>
        </div>     
    </nav> );
}

export default Navbar;