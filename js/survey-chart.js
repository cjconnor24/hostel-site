var element;
var total = 0;
var count = data.survey;

// CALCULATE THE TOTAL ENTRIES
for(i=0;i<count.length;i++){
    total += parseInt(count[i].total);
}

console.log(total);

for (element in data.survey) {
    var names = data.survey[element].mode;
    var values = data.survey[element].total;

//                    ROW
    var node = document.createElement("tr");

//                    CELL
    var subnode1 = document.createElement("td");
//                    var textnode1 = document.createTextNode('fa-'+names.toLowerCase());
    var textnode1 = document.createElement("span");
    textnode1.setAttribute('class','fa fa-'+names.toLowerCase());


//                    CELL
    var subnode3 = document.createElement("td");
    var subsubnode = document.createElement("canvas");

    subnode1.appendChild(textnode1);
    subnode3.appendChild(subsubnode);

    var att = subsubnode.setAttribute("id", names);


    node.appendChild(subnode1);
    node.appendChild(subnode3);
    document.getElementById("chart").appendChild(node);

    var c = document.getElementById(names);
    var bar = c.getContext("2d");
    var length = values;
    if (values > 0) {
        if (length > 100)
            length = 100;
        bar.fillStyle = "#323232"; //"blue";
    }
    bar.rect(0, 0, length*100, 100);
    bar.fill();
    bar.fillStyle = "#FFFFFF";
    bar.font = "30px Arial";
    bar.fillText(values,10,50);


}