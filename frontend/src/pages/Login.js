import React from "react";
import { useState } from "react";
import { Navigate } from "react-router-dom";
import { Link } from 'react-router-dom';

function Login(props) {
    const [email, setEmail] = useState("");
    const [password, setPassword] = useState("");


    const submit = async (e) => {
        e.preventDefault();
        try {
            const response = await fetch("http://localhost:8000/api/login", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                credentials: "include",
                body: JSON.stringify({ email, password }),
            });

            if (response.status === 200) {
                console.log("login success");
                props.setLoggedin(true);
            } else if (!response.ok) {
                throw new Error(`error ${response.status}`);
            }

            const token = await response.json();
            props.setToken(token.access_token);
            console.log(token.access_token);
            localStorage.setItem("access_token", token.access_token);
        } catch (error) {
            console.log(error);
        }
    };

    if (props.loggedin) {
        return <Navigate to="/" />;
    }

    return (
        <div className="LoginForm">
            <form onSubmit={submit}>
                <h1 className="h3 mb-3 fw-normal">Please sign in</h1>
                <div className="">
                    <input
                        type="text"
                        className="form-control"
                        placeholder="email"
                        onChange={(e) => {
                            setEmail(e.target.value);
                        }}
                    />
                </div>
                <br />

                <div className="">
                    <input
                        type="password"
                        className="form-control"
                        placeholder="password"
                        onChange={(e) => {
                            setPassword(e.target.value);
                        }}
                    />
                </div>
                <br />
                <button className="btn btn-primary w-100 py-2" type="submit">
                    Sign in
                </button>
                <Link to="/forgotpassword">Forgot password</Link>
            </form>

        </div>
    );
}

export default Login;
