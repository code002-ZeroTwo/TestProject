import {  useEffect, useState } from "react";
import "./App.css";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import Login from "./pages/Login";
import Register from "./pages/Register";
import ForgotPassword from "./pages/ForgotPassword";
import Home from "./pages/Home/Home";
import Nav from "./components/Nav"
import ChangePassword from "./pages/ChangePassword";

function App() {
    const [token, setToken] = useState("");
    const [name, setName] = useState("");
    const [loggedin, setLoggedin] = useState(false);

    useEffect(() => {
      const token = localStorage.getItem('access_token');
      setToken(token);
    },[]);

    return (
        <div className="App">
          <BrowserRouter>
            <Nav name={name} setName={setName} token={token} setLoggedin={setLoggedin}/>
            <Routes>
              <Route path="/" Component={() => <Home token={token} setName={setName} loggedin={loggedin} setLoggedin={setLoggedin}/>} />
              <Route path="/login" Component={() => {
                return <Login token={token} setToken={setToken} setLoggedin={setLoggedin} loggedin={loggedin}/>
              }} />
              <Route path="/register" Component={() => {
                return <Register token={token} setToken={setToken} setLoggedin={setLoggedin} loggedin={loggedin}/>
              }} />
              <Route path="/forgotpassword" Component={() => <ForgotPassword />}/>
              <Route path="/reset/:token" Component={() => <ChangePassword />}/>
            </Routes>
          </BrowserRouter>
        </div>
    );
}

export default App;
