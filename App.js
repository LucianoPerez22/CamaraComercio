import React from 'react';
import { StyleSheet,  View, Text } from 'react-native';


//COMPONENTES
import Principal from './components/home';

export default function App(){
  return(  
      <Principal />
  )
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
  },
 

});
