import React, { useState } from "react";

const ForgotPassword = () => {
    const [email, setEmail] = useState("");
    const [message,setMessage] = useState("");


    const submit = async (e) => {
       e.preventDefault(); 
       const response = await fetch("http://localhost:8000/api/forgot-password", {
           method: "POST",
           headers: { "Content-Type": "application/json" },
           body: JSON.stringify({email}),
       })
       if(response.ok){
        setMessage("password reset link sent to your email");
       }
       else{
        setMessage("email not found");
       }
    }

    return (
        <div>
            <h1>hello world</h1>
            <form onSubmit={submit}>
                <div>
                    <input
                        type="email"
                        className="form-control"
                        placeholder="name@example.com"
                        onChange={(e) => setEmail(e.target.value)}
                    />
                </div>
                <button className="btn btn-primary w-100 py-2" type="submit">
                    request password reset link
                </button>
            </form>
            {message && <p>{message}</p>}
        </div>
    );
};

export default ForgotPassword;
