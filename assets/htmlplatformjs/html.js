const newTag = (a) => {
  var html = "";
  if(a.createTag != undefined){
     for(var i=0; i < a.createTag.length; i++){
        html += "<"+a.createTag[i].tagName+" ";
        if(a.createTag[i].className != undefined){
           html += " class = '"+a.createTag[i].className+"' ";
        }
        html += ">";
        if(a.createTag[i].child != undefined){
           html += a.createTag[i].child;
        }
        html += "</"+a.createTag[i].tagName+">";
     }
  }
  return html;
}