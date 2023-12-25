import React from "react";
import { useEffect } from "react";
import { useState } from "react";
import { Navigate } from "react-router-dom";
import "./Home.css";

const Home = (props) => {
    const [content, setContent] = useState({});
    const token = localStorage.getItem("access_token");

    useEffect(() => {
        (async () => {
            try {
                const response = await fetch("http://localhost:8000/api/user", {
                    headers: {
                        "Content-Type": "application/json",
                        Authorization: `Bearer ${token}`,
                    },
                    credentials: "include",
                });

                const content = await response.json();
                if (response.ok) {
                    setContent(content.data);
                    console.log(content.data);
                    props.setName(content.data.name);
                    props.setLoggedin(true);
                } else {
                    // Handle error...
                    throw new Error(
                        `Error ${response.status}: ${response.statusText}`
                    );
                }

                console.log(content);
            } catch (error) {
                console.log(error);
            }
        })();
    }, []);

    if (!props.loggedin) {
        console.log("is this the one in wrong");
        return <Navigate to="/login" />;
    }

    return (
        <div className="card-container">
            <div className="card">
                <div className="upper-section">
                    <div>
                        <div></div>

                        <div className="text-container">Identity Card</div>
                        <div className="text-container">
                            Identity Card Type: 'D'
                        </div>
                    </div>
                    <div className="texts">
                        <div className="Red-text-container">
                            Palungtar Municipality
                        </div>
                        <div className="Red-Big-text-container">
                            Office Of The Municipal Executive
                        </div>
                        <div className="Big-text-container">
                            Palungtar,Gorkha
                        </div>
                        <div className="Big-text-container">
                            Gandaki Province,Nepal
                        </div>

                        <div className="DisabilityIDCard">
                            Disability Identity Card
                        </div>
                    </div>
                </div>

                <div className="middle-section text-container">
                    <div className="address-details">
                        <p>Full Name of person: {content.name}</p>
                    </div>
                    <div className="address-details">
                        <p>
                            <strong>Address: Gandaki province</strong>
                            <strong>District: Gorkha</strong>
                            <strong>Palungtar Municipality</strong>
                            <strong>Ward No:{content.ward}</strong>
                        </p>
                    </div>

                    <div className="address-details">
                        <p>
                            <strong>Date of Birth: {content.dob}</strong>
                            <strong>
                                Citizenship Number:{content.citizenship}
                            </strong>
                            <strong>Sex:{content.sex} </strong>
                            <strong>Blood Group:{content.blood_group}</strong>
                        </p>
                    </div>

                    <div className="address-details">
                        <p>
                            <strong>Types of disability:</strong>
                            <strong>
                                On the basis of nature: {content.nature}
                            </strong>
                            <strong>
                                On the basis of Severity:{content.severity}{" "}
                            </strong>
                        </p>
                    </div>

                    <div className="address-details">
                        <p>
                            <strong>
                                Father Name or Mother Name or Guardian Name:{" "}
                                {content.name_of_guardian}
                            </strong>
                        </p>
                    </div>
                </div>

                <div className="lower-section">
                    <div className="left-side">
                        <div>Approved by</div>
                        <p>Name: </p>
                        <p>Signature: </p>
                        <p>Date: </p>
                    </div>

                    <div className="right-side">
                        <p>...............................................</p>
                        <p className="text">Signature of ID card Holder</p>
                    </div>
                </div>

                <div className="lowest-section">
                    <p>
                        "if somebody finds this ID card, please deposit this in
                        the nearby police or municipality office"
                    </p>
                </div>
            </div>
        </div>
    );
};

export default Home;
