import * as React from 'react';
import { Stack, IStackStyles } from '@fluentui/react/lib/Stack';
import { NeutralColors } from '@uifabric/fluent-theme/lib/fluent/FluentColors';


//user components
import NavBar from './NavBar';


const Header = () => {
  
   return (
      <Stack.Item align="auto" styles={barStyle}>
         <NavBar />
      </Stack.Item>
   )

}
export default Header;

const  barStyle: IStackStyles = {
   root:{
      backgroundColor :NeutralColors.gray110
   }
}