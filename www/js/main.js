///* 
// * function Adding products to the cart
// * @param integer item ID of product
// * @return in case of succes, will refresh dates of the cart on the page
// * 
// */
//



function addToCart(itemId){
   $.ajax({
     
      type: 'GET',
      url:"/cart/addtocart/"+itemId+'/',
      dataType: 'json',
      success: function(data){

        if(data["success"]){
          
       //  alert ('Pizdets!');
              $('#cartCntItems').html(data['cntItems']);
              $('#addCart_'+itemId).hide();
              $('#removeCart_'+itemId).show();
        }
            
    }
               
   });
}
// * function remove products from cart
// * @param integer item ID of product
// * @return in case of succes, will refresh dates of the cart on the page
// * 
// */
function removeFromCart(itemId){
    //alert('Item id is'+itemId);
   console.log("js - removeFromCart()");
    $.ajax({
        type: 'POST',
    //   async: false,
        url: "/cart/removefromcart/"+itemId+"/",
        dataType: 'json',
        success: function(data){
            if(data['success']){
                $('#cartCntItems').html(data['cntItems']);
                $('#addCart_'+itemId).show();
                $('#removeCart_'+itemId).hide();
                
            }
            
            
            
        }
        
         
        
    });
    
}


 function conversionPrice(itemId) {
    var newCnt =$('#itemCnt_'+itemId).val();
    var itemPrice =$('#itemPrice_'+itemId).attr('value');
    var itemRealPrice =newCnt * itemPrice;
    $('#itemRealPrice_'+itemId).html(itemRealPrice);
}

/*
*Getting data from form
*/


function getData(obj_form){
    var hData= {};
    $('input, textarea, select', obj_form).each(function(){//Probigaem po vsem metodam i obiectam
        
        if(this.name && this.name!=''){
            
            hData[this.name]=this.value;
            console.log('hData['+this.name+'] = '+hData[this.name]);
            
        }
        
        
    });
    
    return hData;
    
      
} ;
/*
*Registration of the new user
*/

function registerNewUser(){
    var postData=getData('#registerBox');

    $.ajax({
       type: 'POST',
       url:"/user/register/",
       data: postData,
       dataType: 'json',

        success: function(data){     

            if(data['success']){
                
                $('#demo').html('User was successefuly created');
                $('#loginBox').hide();
                $('#registerBox').hide();
                $('#userBox').show();
                $('#userLink').attr('href','/user/');
                $('#userLink').html(data['userName']);
            }else{


                  var rs, i, text = "";
                  rs = data;

                  for (i = 0; i < rs.message.length; i++) {
                      text += rs.message[i] + "<br>";
                  }
                  $('#registerResult').html(text);


            }
 
        }
        

    })
    
    } 

//Logout
function logout(){

    $.ajax({
        type: 'POST',
        url: "/user/logout/",
        dataType: 'json',
        success: function(data){
            if(data['success']){
                  window.location.replace("http://newstore.loc/");              
            }
            
            
            
        }
        
         
        
    });
    
}

//login

function login(){
  console.log();
    var email =$('#lemail').val();
    var password =$('#lpassword').val();
    var postData = "email="+ email +"&password=" +password;

    $.ajax({
       type: 'POST',
       url:"/user/login/",
       data: postData,
       dataType: 'json',

        success: function(data){     

            if(data['success']){
                
                $('#registerResult').html('Login successful');
                $('#loginBox').hide();
                $('#registerBox').hide();
                $('#userBox').show();
                $('#userLink').attr('href','/user');
                $('#userLink').html(data['userName']);
                
                //# Fill the fields on order page

                  $('#name').val(data['name']);
                  $('#phone').val(data['phone']);
                  $('#address').val(data['address']);
                //#

                $('#btnSaveOrder').show();


            }else{


                  var rs, i, text = "";
                  rs = data;

                  for (i = 0; i < rs.message.length; i++) {
                      text += rs.message[i] + "<br>";
                  }
                  $('#registerResult').html(text);


            }
 
        }
        

    })
    
    } 


function updateUserData(){

    var email =     $('#newlogin').val();
    var name =      $('#newName').val();
    var address =   $('#newAddress').val();
    var phone =     $('#newPhone').val();
    var password =  $('#newPassword').val();
    var password2 = $('#newPassword2').val();
    var cuPwd =     $('#cuPwd').val();
    var postData ={email: email,
                    name: name,
                    address: address,
                    phone: phone,
                    password: password,
                    password2: password2,
                    cuPwd: cuPwd};

    $.ajax({
       type: 'POST',
       url:"/user/update/",
       data: postData,
       dataType: 'json',

        success: function(data){     

            if(data['success']){
                


                $('#userLink').html(data['userName']);
                $('#userRS').html(data['message']);
                $('#userRS').css("background-color", "#66ff66");

            }else{


                  var rs, i, text = "";
                  rs = data;

                  for (i = 0; i < rs.message.length; i++) {
                      text += rs.message[i] + "<br>";
                  }
                  $('#userRS').html(text);
                  $('#userRS').css("background-color", "red");




            }
 
        }
        

    })
    
    } 


    /*
    *Saving Order
    */
    function saveOrder(){
    var postData=getData('form');


    $.ajax({
       type: 'POST',
       url:"/cart/saveorder/",
       data: postData,
       dataType: 'json',

        success: function(data){     

            if(data['success']){
                
               alert(data['message']);
               document.location='/';
            }else{


                alert(data['message']);

            }
 
        }
        

    })
    
    } 