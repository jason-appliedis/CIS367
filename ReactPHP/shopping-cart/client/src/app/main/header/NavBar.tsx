import * as React from "react";
import { IRenderFunction, Pivot, PivotItem , IPivotItemProps,Label, ILabelStyles} from '@fluentui/react';
import { IStyleSet } from "office-ui-fabric-react/lib/Styling";
import {   BrowserRouter as Router, Link } from "react-router-dom";
import kebabCase from 'lodash/kebabCase';

const labelStyles: Partial<IStyleSet<ILabelStyles>> = {
  root: { marginTop: 10 },
};

const NavBar = () => {
  const [selectedKey, setSelectedKey] = React.useState('/');

  
  const handleLinkClick = (item: PivotItem) => {
      setSelectedKey(item.props.itemKey!);
      
  };

  return (
     <Pivot aria-label="Page routing"
    headersOnly={true}
    selectedKey={selectedKey}
    onLinkClick={handleLinkClick}
    >
      <PivotItem headerText="Home" key="home" onRenderItemLink ={setRouterLink()} />
      <PivotItem headerText="Shopping Cart" key="shoppingCart"  onRenderItemLink ={setRouterLink()}/>
      <PivotItem headerText="Catalog" key="catalog" onRenderItemLink ={setRouterLink()}/>
      <PivotItem headerText="Register User" key="registerUser"  onRenderItemLink ={setRouterLink()} />
    </Pivot>
  );
};
// {'urlPath':'/catalog','label':'Catalog'}/
// {'urlPath':'/register-user','label':'Register User'}
// {'key': 'shoppingCart','label':'Shopping Cart'}/
// {'urlPath':'/home','label': 'Home'}/

export default NavBar;
// (props?: Element, defaultRender?: (props?: Element) => Element)

const setRouterLink:IRenderFunction<IPivotItemProps> = (props?: IPivotItemProps, defaultRender?: (props?: Element) => <Link to={kebabCase(props.headerText)}>{props.headerText}</Link>

} ) => 


/**
 * 
 */