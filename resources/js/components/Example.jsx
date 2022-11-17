import React, { useState } from "react";
import ReactDOM from "react-dom/client";

function Example() {
    const [value, setValue] = useState("");

    function changeHandler(e) {
        setValue(() => e.target.value);
    }

    return (
        <div className="card">
            <div className="card-header">Example React Component</div>

            <div className="card-body">
                <input
                    type="text"
                    placeholder="Введите любой текст"
                    onChange={changeHandler}
                    value={value}
                />
                <p>Ваш текст: {value}</p>
            </div>
        </div>
    );
}

export default Example;

if (document.getElementById("example")) {
    const Index = ReactDOM.createRoot(document.getElementById("example"));

    Index.render(
        <React.StrictMode>
            <Example />
        </React.StrictMode>
    );
}
