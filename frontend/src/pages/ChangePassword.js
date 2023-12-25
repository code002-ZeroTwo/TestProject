import React, { useState } from "react";
import { useParams } from "react-router-dom";
import { Navigate } from "react-router-dom";

const ChangePassword = (props) => {
    const [password, setPassword] = useState("");
    const [confirmpassword, setConfirmPassword] = useState("");
    const [navigate, setNavigate] = useState(false);

    const { token } = useParams();

    const submit = async (e) => {
        e.preventDefault();

        const response = await fetch(
            `http://localhost:8000/api/reset-password/${token}/`,
            {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    password: password,
                    password_confirmation: confirmpassword,
                }),
            }
        );

        if (response.ok) {
            console.log("password changed successfully");
            setNavigate(true);
        } else {
            console.log("password not changed");
        }
    };

    if (navigate) {
        return <Navigate to="/login" />;
    }

    return (
        <div>
            <form onSubmit={submit}>
                <div>
                    <div>
                        <input
                            type="password"
                            className="form-control"
                            placeholder="password"
                            onChange={(e) => setPassword(e.target.value)}
                        />
                    </div>
                    <input
                        type="password"
                        className="form-control"
                        placeholder="confirm password"
                        onChange={(e) => setConfirmPassword(e.target.value)}
                    />
                </div>
                <button className="btn btn-primary w-100 py-2" type="submit">
                    change password
                </button>
            </form>
        </div>
    );
};

export default ChangePassword;
