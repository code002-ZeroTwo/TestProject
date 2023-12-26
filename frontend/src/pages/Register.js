import React from "react";
import { useState } from "react";
import { Navigate } from "react-router-dom";

const Register = (props) => {
    const [name, setName] = useState("");
    const [ward, setWardNo] = useState("");
    const [dob, setDate] = useState("");
    const [citizenship, setCitizenship] = useState("");
    const [sex, setSex] = useState("");
    const [bloodgroup, setBloodGroup] = useState("");
    const [nature, setNature] = useState("");
    const [severity, setSeverity] = useState("");
    const [guardianname, setGuardian] = useState("");
    const [email, setEmail] = useState("");
    const [password, setPassword] = useState("");
    const [navigate, setNavigate] = useState(false);

    const submit = async (e) => {
        e.preventDefault();

        try{
        const response = await fetch("http://localhost:8000/api/register", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            credentials: "include",
            body: JSON.stringify({
                name: name,
                email: email,
                wardno: ward,
                citizenshipno: citizenship,
                sex: sex,
                bloodgroup: bloodgroup,
                dateofbirth: dob,
                nature: nature,
                severity: severity,
                guardianname: guardianname,
                password: password,
            }),
        });

        if (response.status === 200) {
            setNavigate(true);
            console.log("registration  success");
            props.setLoggedin(true);
        } else {
            console.log("registration failed");
            throw new Error(`error ${response.status}`);
        }
        const token = await response.json();
        props.setToken(token.access_token);
        console.log(token.access_token);
        localStorage.setItem("access_token", token.access_token);

    }
    catch(error){
        console.log(error);
    }

    };
    if (props.loggedin) {
        return <Navigate to="/" />;
    }

    return (
        <div className="LoginForm">
            <form onSubmit={submit}>
                <h1 className="h3 mb-3 fw-normal">Please Register</h1>
                <div>
                    <input
                        type="text"
                        className="form-control"
                        placeholder="Full Name"
                        onChange={(e) => setName(e.target.value)}
                    />
                </div>
                <br />
                <div>
                    <input
                        type="number"
                        className="form-control"
                        placeholder="ward number"
                        onChange={(e) => setWardNo(e.target.value)}
                    />
                </div>

                <br />
                <div>
                    <input
                        type="date"
                        name="dob"
                        className="form-control"
                        placeholder="date of birth"
                        onChange={(e) => setDate(e.target.value)}
                        required
                    />
                </div>

                <br />
                <div>
                    <input
                        type="text"
                        className="form-control"
                        placeholder="citizenship number"
                        onChange={(e) => setCitizenship(e.target.value)}
                    />
                </div>

                <br />
                <div>
                    <input
                        type="text"
                        className="form-control"
                        placeholder="sex"
                        onChange={(e) => setSex(e.target.value)}
                    />
                </div>

                <br />
                <div>
                    <input
                        type="text"
                        className="form-control"
                        placeholder="bloodgroup"
                        onChange={(e) => setBloodGroup(e.target.value)}
                    />
                </div>

                <br />
                <div>
                    <input
                        type="text"
                        className="form-control"
                        placeholder="Disability: Nature"
                        onChange={(e) => setNature(e.target.value)}
                    />
                </div>
                <br />
                <div>
                    <input
                        type="text"
                        className="form-control"
                        placeholder="Disability: Severity"
                        onChange={(e) => setSeverity(e.target.value)}
                    />
                </div>
                <br />
                <div>
                    <input
                        type="text"
                        className="form-control"
                        placeholder="Guardian Name"
                        onChange={(e) => setGuardian(e.target.value)}
                    />
                </div>
                <br />
                <div>
                    <input
                        type="email"
                        className="form-control"
                        placeholder="name@example.com"
                        onChange={(e) => setEmail(e.target.value)}
                    />
                </div>
                <br />
                <div>
                    <input
                        type="password"
                        className="form-control"
                        placeholder="password"
                        onChange={(e) => setPassword(e.target.value)}
                    />
                </div>
                <br />

                <button className="btn btn-primary w-100 py-2" type="submit">
                    Register
                </button>
            </form>
        </div>
    );
};

export default Register;
