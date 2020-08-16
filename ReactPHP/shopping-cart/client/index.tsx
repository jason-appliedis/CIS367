import * as React from "react";
import * as ReactDOM from "react-dom";
import App from "./src/app/main/App";
import { lightTheme } from './src/app/themes/Themes';
import { BrowserRouter } from "react-router-dom";
//create theme 
lightTheme();


ReactDOM.render(<App />,document.getElementById("root"));

