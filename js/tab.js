function go()
{
    var str=' we are learning javascript today ';
    document.write("<br>"+str.toUpperCase());
    document.write("<br>"+str.toLowerCase());
    document.write("<br>"+str.replace('today','today and tomorrow'));
    document.write("<br>"+str.split(" "));
    document.write("<br>"+str.indexOf("j"));
    document.write("<br>"+str.lastIndexOf("l"));
    document.write("<br>"+str.charAt("10"));
    document.write("<br>"+str.charCodeAt("11"));
    document.write("<br>"+str.trim());
    for(var i=0; i<5;i++){
        document.write("<h1>hello</h1>")
    }
   document.write("<br>"+str.substr(7,5));

}
