
function getXmlHttpObject(){
   var XmlObject;
   try{
       XmlObject = new XMLHttpRequest();
   }catch (e){
       try{
           XmlObject = new ActiveXObject("Msxml2.XMLHTTP");
       }catch (e){
           try{
               XmlObject = new ActiveXObject("Microsoft.XMLHTTP");
           }catch (e){
               alert("Oops something went wrong");
               return false;
           }
       }
   }
   return XmlObject;
};

var XmlObject = getXmlHttpObject();
function CheckMe(element){
    if(element.id=="user_name"){
        if(XmlObject)
        {
            try{
                XmlObject.open("GET","./php/test.php?user_name="+element.value,true);
                XmlObject.onreadystatechange=checkExistingUserName;
                XmlObject.send(null);
            }
            catch(e){
                //do something
            }
        }
    }
    else if(element.id=="email"){
        if(XmlObject)
        {
            try{
                XmlObject.open("GET","./php/test.php?email="+element.value,true);
                XmlObject.onreadystatechange=checkExistingEmail;
                XmlObject.send(null);
            }
            catch(e){
                //do something
            }
        }
    }
}

function checkExistingUserName(){
     if(XmlObject.readyState===4 && XmlObject.status===200){
        console.log("Got the correct response");
        var xml = XmlObject.responseText;
        var ele = document.getElementById('err_uname');
        if(xml=="false"){
            ele.innerHTML="That user name my friend, is taken.";
        }
        else ele.innerHTML="";
     }
}

function checkExistingEmail(){
     if(XmlObject.readyState===4 && XmlObject.status===200){
        console.log("Got the correct response email");
        var xml = XmlObject.responseText;
        var ele = document.getElementById('err_email');
        if(xml=="false"){
            ele.innerHTML="The email is already registered";
        }
        else ele.innerHTML="";
     }
}
