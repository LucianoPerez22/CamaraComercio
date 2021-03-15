
import React from 'react';
import { Image,ImageBackground, StyleSheet, Text, View, TouchableOpacity, ScrollView } from 'react-native';
import { createAppContainer, StackActions } from 'react-navigation';
import { createStackNavigator } from 'react-navigation-stack';

//Componentes
import Comidas from './Comidas';

const ComidasScreen = ( { navigation } ) => {
  return(
    <Comidas />
  );
}

const HomeScreen = ( {navigation} ) => {   
    return(
      <View style={styles.container}>
      
        <ImageBackground source={require('../assets/fondo9.jpg')} style={styles.fondo}>
       
       <ScrollView style={styles.scrollview}>
       {/* PF BOTONES */}
         <View style={{
           marginLeft:90,
           marginTop: 20,
           //flex:2,
           flexDirection:'row',  
         }} >
       
           <View style={{
               marginRight:30,
           }}>
           <TouchableOpacity style={styles.button} onPress={() => navigation.push('Comidas')} >
               <Image source={require("../assets/icon_comida.jpg")} style={{
                   marginTop: 0,
                   marginLeft: 10,    
               }}
               />
               </TouchableOpacity>
               <Text style={{
               marginTop:-10,
               marginLeft:-10,
               color: 'black',
               fontSize:12,
               fontWeight:'bold',
               }}>¿Tenes hambre?</Text>
           </View>
           <View> 
               <TouchableOpacity style={styles.button}>
               <Image source={require("../assets/icon_provisiones.jpg")} style={{
                   marginTop: 0,
                   marginLeft: 10,
                   
               }}/>
               </TouchableOpacity>
               <Text style={{
               marginTop:-10,
               marginLeft:10,
               color: 'black',
               fontSize:12,
               fontWeight:'bold',
               }}>¿Te falto algo?</Text>
           </View>
         </View>
         
         {/* SEGUNDA FILA BOTONES */}
         <View style={{
           marginLeft:90,
           marginTop: 20,
           //flex:2,
           flexDirection:'row',
         }} >
           <View> 
               <TouchableOpacity style={styles.button}>
               <Image source={require("../assets/icon_farmacia.jpg")} style={{
                   marginTop: 0,
                   marginLeft: 10,
                   
               }}/>
               </TouchableOpacity>
               <Text style={{
               marginTop:-10,
               marginLeft:10,
               color: 'black',
               fontSize:12,
               fontWeight:'bold',
               }}>Farmacias</Text>
           </View>
      
           <View style={{
               marginLeft: 30,
           }}> 
               <TouchableOpacity style={styles.button} >
               <Image source={require("../assets/icon_servicio_mecanico.jpg")} style={{
                   marginTop: 0,
                   marginLeft: 10,
                   
               }}/>
               </TouchableOpacity>
               <Text style={{
               marginTop:-10,
               marginLeft:-20,
               color: 'black',
               fontSize:12,
               fontWeight:'bold',
               }}>Servicios Mecanicos</Text>
           </View>
         </View>
         
         {/* TERCERA FILA BOTONES */}
         <View style={{
           marginLeft:90,
           marginTop: 20,
           //flex:2,
           flexDirection:'row',
         }} >
           <View> 
               <TouchableOpacity style={styles.button} >
               <Image source={require("../assets/icon_indumentaria.jpg")} style={{
                   marginTop: 0,
                   marginLeft: 10,
                   
               }}/>
               </TouchableOpacity>
               <Text style={{
               marginTop:-10,
               marginLeft:0,
               color: 'black',
               fontSize:12,
               fontWeight:'bold',
               }}>Indumentaria</Text>
           </View>
      
           <View style={{
               marginLeft: 30,
           }}> 
               <TouchableOpacity style={styles.button} >
               <Image source={require("../assets/icon_librerias.jpg")} style={{
                   marginTop: 0,
                   marginLeft: 10,
                   
               }}/>
               </TouchableOpacity>
               <Text style={{
               marginTop:-10,
               marginLeft:20,
               color: 'black',
               fontSize:12,
               fontWeight:'bold',
               }}>Librerias</Text>
           </View>
         </View>
      
         {/* CUARTA FILA BOTONES */}
         <View style={{
           marginLeft:90,
           marginTop: 20,
           //flex:2,
           flexDirection:'row',
         }} >
           <View> 
               <TouchableOpacity style={styles.button} >
               <Image source={require("../assets/icon_telefonos_utiles.jpg")} style={{
                   marginTop: 0,
                   marginLeft: 10,
                   
               }}/>
               </TouchableOpacity>
               <Text style={{
               marginTop:-10,
               marginLeft:-5,
               color: 'black',
               fontSize:12,
               fontWeight:'bold',
               }}>Telefonos Utiles</Text>
           </View>
      
           <View style={{
               marginLeft: 30,
           }}> 
               <TouchableOpacity style={styles.button} >
               <Image source={require("../assets/icon_bares.jpg")} style={{
                   marginTop: 0,
                   marginLeft: 10,
                   
               }}/>
               </TouchableOpacity>
               <Text style={{
               marginTop:-10,
               marginLeft:10,
               color: 'black',
               fontSize:12,
               fontWeight:'bold',
               }}>Bares & Pub</Text>
           </View>
         </View>
      
         {/* QUINTA FILA BOTONES */}
         <View style={{
           marginLeft:90,
           marginTop: 20,
           //flex:2,
           flexDirection:'row',
         }} >
           <View> 
               <TouchableOpacity style={styles.button} >
               <Image source={require("../assets/icon_gimnasios.jpg")} style={{
                   marginTop: 0,
                   marginLeft: 10,
                   
               }}/>
               </TouchableOpacity>
               <Text style={{
               marginTop:-10,
               marginLeft:10,
               color: 'black',
               fontSize:12,
               fontWeight:'bold',
               }}>Gimnasios</Text>
           </View>
      
           <View style={{
               marginLeft: 30,
           }}> 
               <TouchableOpacity style={styles.button} >
               <Image source={require("../assets/icon_peluquerias.jpg")} style={{
                   marginTop: 0,
                   marginLeft: 10,
                   
               }}/>
               </TouchableOpacity>
               <Text style={{
               marginTop:-10,
               marginLeft:10,
               color: 'black',
               fontSize:12,
               fontWeight:'bold',
               }}>Peluquerias</Text>
           </View>
         </View>
      </ScrollView>
      <Text style={styles.titulo}>Business Soft ® 2020</Text>
      </ImageBackground>
   </View>
    )
}

const LogoCamara = ()=>{
  return(
    <View style={{
      flexDirection:'row',
    }}>
      <Image source={require('../assets/icon_camara.jpg')} />
      <Text style={{
        color:'black',
        marginTop:10,
        marginLeft:10,
        fontSize:12,
      }}>Camara de Comercio - MiCiudad</Text>
    </View>
  )
}
const Principal = createStackNavigator({
  Home: {
    screen: HomeScreen
  },
  Comidas: {
    screen: ComidasScreen
  }
}, 
{ initialRouteName: 'Home',
  defaultNavigationOptions: {
  headerStyle: {
    backgroundColor: '#f2f2f2'
  },
  headerTintColor: 'white',
  
  headerTitle: () => <LogoCamara />,
  } })

export default createAppContainer(Principal);
 
const styles = StyleSheet.create({
    button: {
      width: 90,
      height: 70,
      backgroundColor: '#fff',
      borderWidth:2,
      borderColor: '#20c997' ,//'#d8d8d8',
      //borderTopLeftRadius:20,
      //borderBottomRightRadius:20,
      borderRadius:50,
      padding: 10,
      marginBottom: 20,
      shadowColor: 'blue',
      shadowOffset: { width: 0, height: 5 },
      shadowRadius: 3,
      shadowOpacity: 0.35,
      elevation:5,
    },
    container: {
      flex: 1,
    },
    fondo: {
      flex: 1,
      resizeMode: "cover",
      justifyContent: "center",
      
    },
    text: {
      color: "white",
      fontSize: 42,
      fontWeight: "bold",
      textAlign: "center",
      backgroundColor: "#000000a0"
    },
    titulo: {
        height: 25,
        marginTop: 40,
        backgroundColor: 'black',
        color:'white',
        fontSize:12,
        textAlign:'center',

    },
    scrollview: {
      width:'100%',
    },
  
  });
  