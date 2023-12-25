import React from "react";
import { Link } from "react-router-dom";

function Nav(props) {
    let menu;
    const logout = async () => {
        await fetch("http://localhost:8000/api/logout", {
            method: "POST",
            headers: { "Content-Type": "application/json" ,
            "Authorization": `Bearer ${props.token}`},
            credentials: "include",
        });
        props.setName("");
        props.setLoggedin(false);
        localStorage.removeItem("access_token");
    };
    console.log(props);

    if (!props.name) {
        menu = (
            <div className="collapse navbar-collapse" id="navbarCollapse">
                <ul className="navbar-nav me-auto mb-2 mb-md-0">
                    <li className="nav-item active">
                        <Link to="/login" className="nav-link">
                            Login
                        </Link>
                    </li>
                    <li className="nav-item active">
                        <Link to="/register" className="nav-link">
                            Register
                        </Link>
                    </li>
                </ul>
            </div>
        );
    } else {
        menu = (
            <ul className="navbar-nav me-auto mb-2 mb-md-0">
                <li>
                    <Link to="/profile" className="nav-link">
                        {props.name}
                    </Link>
                </li>
                <li className="nav-item active">
                    <Link to="/login" className="nav-link" onClick={logout}>
                        Logout
                    </Link>
                </li>
            </ul>
        );
    }
    return (
        <div>
            <nav className="navbar navbar-expand-md navbar-dark bg-dark mb-4">
                <div className="container-fluid">
                    <Link to="/" className="navbar-brand">
                        Home
                    </Link>
                    <div>{menu}</div>
                </div>
            </nav>
        </div>
    );
}

export default Nav;
