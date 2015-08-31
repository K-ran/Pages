//The function return the XmlObject
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
   return XmlObject;
}
