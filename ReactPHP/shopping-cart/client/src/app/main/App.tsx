import * as React from "react";
import Header from './header/Header';
import Footer from './footer/Footer';
import { Stack } from '@fluentui/react/lib/Stack';
import { Customizer } from 'office-ui-fabric-react';
import { FluentCustomizations } from '@uifabric/fluent-theme';
import {
    BrowserRouter as Router,
    Switch,
    Route,
    Link
  } from "react-router-dom";


//custom Items
import RegisterUser from '../components/RegisterUser';
import Catalog from '../components/Catalog';
import ShoppingCart from '../components/ShoppingCart';


//php import
import myApp from 'myApp';


const App = (props: any) => {
    const { user : { name, email }, logged } = myApp;
    return (
        <Customizer {...FluentCustomizations}>
        <Stack>
            <Header />
                <Stack verticalFill>
                <Router>
                    {/* Main Content Here */}
                    <Switch>
                        <Route exact path="/home">
                            <h1>Welcome</h1>
                        </Route>
                        <Route path="/shopping-cart">
                            <ShoppingCart />
                        </Route>
                        <Route path="/catalog">
                            <Catalog />
                        </Route>
                        <Route path="/register-user">
                            <RegisterUser />
                        </Route>
                    </Switch>
                </Router>

                </Stack>
            <Footer />
        </Stack>
        </Customizer>

  )
  };

export default App;
