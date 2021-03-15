import React from 'react';
import { Image,ImageBackground, StyleSheet, Text, View, TouchableOpacity, ScrollView, Linking, Button } from 'react-native';
import axios from 'axios';
import { FlatList } from 'react-native-gesture-handler';

//CONEXION
const Conn = 'http://192.168.0.114/CamaraComercio/Back/MostrarComercios.php';

const Direccion = require('../assets/icon_direccion.jpg');
const Telefonos = require('../assets/icon_telefonos.jpg');

export default class Comidas extends React.Component{
    constructor(props){
        super(props);
        this.state = {
            persons : [],  
            categoria : '',
            }
    }
    componentDidMount() {
        this.getDatos();
     }

     getDatos= async () =>{
        await axios.get(Conn)
        .then(res => {
        
        this.setState({ persons : res.data });
        
      })
     }

     async getDatos2(subrubro){
         let url=Conn+'?subrubro='+subrubro;
        
         await axios.get(url)
        .then(res => {
        console.log(res.data);
        if (!res.data.length){
            this.setState({ persons : ""});
        }else{
            this.setState({ persons : res.data});
        }
        
      })
     }

    render() {
      
    return(  
        <View style={styles.principal}> 
        <ScrollView
            horizontal={true}
        >
            <View style={{
                flexDirection:'row',
                marginTop:2,
                marginBottom:5,
                marginLeft:3,
                backgroundColor:'green',
                fontWeight: 'bold',
                height:30,
                
            }}>
               <TouchableOpacity onPress={ ()=> {this.getDatos2(1)}}
                style={{
                   marginRight:5,
                   backgroundColor:'#1070c9',
                   borderWidth:1,
                   borderColor:'pink',
                   borderRadius:5,
                   marginTop:3,
                   height:25,
               }}>
                   <Text style={{
                       fontSize:13,
                       fontWeight:'bold',
                       color:'white',
                       marginTop:3,
                       marginLeft:2,
                       marginRight:2,

                   }}>FAST&FOOD</Text>
               </TouchableOpacity>
               
               <TouchableOpacity onPress={ ()=> {this.getDatos2(2)}}
               style={{
                   marginRight:5,
                   backgroundColor:'#1070c9',
                   borderWidth:1,
                   borderColor:'pink',
                   borderRadius:5,
                   marginTop:3,
                   height:25,
               }}>
                   <Text style={{
                       fontSize:13,
                       fontWeight:'bold',
                       color:'white',
                       marginTop:3,
                       marginLeft:2,
                       marginRight:2,

                   }}>VEGGIE</Text>
               </TouchableOpacity>
              
               <TouchableOpacity onPress={ ()=> {this.getDatos2(4)}}
               style={{
                   marginRight:5,
                   backgroundColor:'#1070c9',
                   borderWidth:1,
                   borderColor: 'pink',
                   borderRadius:5,
                   marginTop:3,
                   height:25,
               }}>
                   <Text style={{
                       fontSize:13,
                       fontWeight:'bold',
                       color:'white',
                       marginTop:3,
                       marginLeft:2,
                       marginRight:2,

                   }}>CHINA</Text>
               </TouchableOpacity>

               <TouchableOpacity style={{
                   marginRight:5,
                   backgroundColor:'#1070c9',
                   borderWidth:1,
                   borderColor: 'pink',
                   borderRadius:5,
                   marginTop:3,
                   height:25,
               }}>
                   <Text style={{
                       fontSize:13,
                       fontWeight: 'bold',
                       color:'white',
                       marginTop:3,
                       marginLeft:2,
                       marginRight:2,

                   }}>RESTAURANT</Text>
               </TouchableOpacity>

               <TouchableOpacity style={{
                   marginRight:5,
                   backgroundColor:'#1070c9',
                   borderWidth:1,
                   borderColor: 'pink',
                   borderRadius:5,
                   marginTop:3,
                   height:25,
               }}>
                   <Text style={{
                       fontSize:13,
                       fontWeight: 'bold',
                       color:'white',
                       marginTop:3,
                       marginLeft:2,
                       marginRight:2,

                   }}>PESCADOS</Text>
               </TouchableOpacity>

               <TouchableOpacity style={{
                   marginRight:5,
                   backgroundColor:'#1070c9',
                   borderWidth:1,
                   borderColor: 'pink',
                   borderRadius:5,
                   marginTop:3,
                   height:25,
               }}>
                   <Text style={{
                       fontSize:13,
                       fontWeight: 'bold',
                       color:'white',
                       marginTop:3,
                       marginLeft:2,
                       marginRight:2,


                   }} >OTRAS
                   
                   </Text>
               </TouchableOpacity>

               
              
            </View>
            </ScrollView>
            <ImageBackground source={require('../assets/fondo9.jpg')} style={styles.fondo} >
           
           <View style={{
               flex:1,
               marginBottom:90,
               marginTop: 30,
               
           }}>
                <FlatList 
                    data={this.state.persons}
                    
                    renderItem={
                        ({item}) =>
                        <View style={item.premium=="NO"?styles.vistas:styles.vistasVip}>
                        <View style={ styles.viewVistas }>
                            <View style={item.premium=="NO"?styles.titular:styles.titularVIP}>
                                <Image 
                                    style={item.premium=="NO"?styles.logos:styles.logosVIP}
                                    source={{uri: 'http://192.168.0.114/CamaraComercio/assets/logos/' + item.logo}}
                                    />
                                    
                                <Text style={item.premium=="NO"?styles.vistasTitulo:styles.tituloVIP}> {item.nombre}</Text>
                            </View>
                        </View>
                        <View>
                            <Text style={styles.vistasDesc}> {item.descripcion}</Text>
                        </View>
            
                        <View style={{flexDirection: 'row', marginTop:15, justifyContent:'flex-start', alignItems:'flex-start', marginLeft:3}}>
                            <Image
                                style={{
                                    marginTop: -5,
                                }}
                                source={Direccion}
                            />
                            <Text style={{fontSize:12}}> {item.direccion}</Text>
                        </View>
            
                        <View style={{flexDirection: 'row', justifyContent:'flex-start', alignSelf:'flex-start', marginLeft:3}}>
                            <Image
                                source={Telefonos}
                            />
                            <Text  style={{marginTop:4, fontSize:12, color:'blue'}} onPress={() => Linking.openURL('https://api.whatsapp.com/send?text=Hola!!! Quisiera pedir...&phone=549'+item.telefonos)}> {item.telefonos}</Text>
                            
                        </View>

                        {item.premium=="SI" ? 
                            <View style={{marginTop:4, alignItems:'center'}}>
                                <View>
                                    <TouchableOpacity style={{
                                        backgroundColor: '#28a745',
                                        borderWidth:2,
                                        width:100,
                                        height:30,
                                        borderColor: 'grey',
                                        borderRadius:20,
                                        marginBottom:10,
                                        
                                    }}>
                                        <Text 
                                            onPress={() => Linking.openURL(item.url_premium)}
                                            style={{
                                            fontWeight:'bold',
                                            color:'white',
                                            marginLeft:3,
                                            marginRight:3,
                                            marginTop:5,
                                            textAlign: 'center',
                                        }}>¡PEDIR!</Text>  
                                    </TouchableOpacity>
                                   
                                </View>
                            </View> : false }
                    </View>
                    }
                    keyExtractor={item => item.id.toString()}
                />
                
           </View>
           
           </ImageBackground>
           
           <View style={{
               height:30,
               marginTop:-110,
               backgroundColor: 'black',
               
               
           }}>
                <Text style={{
                    marginLeft: 30,
                    
                    color: 'white',
                    fontSize: 12,
                }}>Business Soft ® 2020</Text>
            </View>
            
           
       </View>
        
    )};
}

const styles = StyleSheet.create({
   
    vistas: {
        
        width: '75%',
        height: 170,
        borderTopWidth:1,
        borderLeftWidth:1,
        borderRightWidth: 1,
        borderBottomWidth: 1,
        marginLeft:60,
        marginTop:3,
        marginBottom:3,
        flexDirection:'column',
        borderColor: 'orange',
        borderRadius: 20,
        shadowOpacity: 0.35,
        elevation:3,
    },

    vistasVip: {
        width: '80%',
        borderTopWidth:3,
        borderLeftWidth:1,
        borderRightWidth: 1,
        borderBottomWidth: 3,
        marginLeft:50,
        marginTop:3,
        marginBottom:3,
        flexDirection:'column',
        borderColor: 'green',
        borderRadius: 15,
        shadowOpacity: 0.35,
        elevation:3,
    },

    viewVistas: {
        marginLeft:50,
    },

    titular: {
        flexDirection:'column',
    },

    titularVIP:{
        backgroundColor: '#007bff',
        borderRadius: 10,
        width:'96%',
        marginTop:5,
    },

    vistasTitulo: {
        color: 'blue',
        fontSize: 14,
        fontWeight: 'bold',
        marginTop: -40,
        marginLeft: 10,
    },

    tituloVIP: {
        color: 'white',
        fontSize: 14,
        fontWeight: 'bold',
        marginTop: -45,
        marginLeft: 8,
    },

    vistasDesc: {
        fontSize:12,
        textAlign: 'center',
        fontWeight:'bold',
        marginTop: 30,
    },

    logos: {
        width: 50,
        height: 50,
        marginTop:5,
        marginLeft: -40,
        
    },

    logosVIP: {
        width: 50,
        height: 50,
        marginTop:-2,
        marginLeft: -40,
        borderRadius:10
        
    },

    principal:{
        flex:1,
    },

    fondo: {
        flex:20,
        resizeMode: "cover",
        justifyContent: "center",
        marginTop:-45,
      },

      boton_Menu: {
        marginRight:5,
        backgroundColor:'#1070c9',
        borderWidth:1,
        borderColor:'pink',
        borderRadius:5,
        marginTop:3,
        height:25,
      }
})