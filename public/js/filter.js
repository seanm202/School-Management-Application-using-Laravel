function myDepartment(num) {
  let text1 = "department";
let text2 = num;
let result = text1.concat("", text2);

let result1 = result.concat("", text1);
var elements = document.getElementsByClassName(result1);
for(var i=0; i<elements.length; i++) {

    if(elements[i].style.display==="none")
    {
      elements[i].style.display = "block";
    }
    else {
      elements[i].style.display = "none";
    }
  }
  }


  function myGrade(num) {
    let text1 = "grade";
  let text2 = num;
  let result = text1.concat("", text2);
  let result1 = result.concat("", text1);

  var elements = document.getElementsByClassName(result1);
  for(var i=0; i<elements.length; i++) {

      if(elements[i].style.display==="none")
      {
        elements[i].style.display = "block";
      }
      else {
        elements[i].style.display = "none";
      }
    }
    }

      function mySemester(num) {
        let text1 = "semester";
      let text2 = num;
      let result = text1.concat("", text2);

      let result1 = result.concat("", text1);
      var elements = document.getElementsByClassName(result1);
      for(var i=0; i<elements.length; i++) {

          if(elements[i].style.display==="none")
          {
            elements[i].style.display = "block";
          }
          else {
            elements[i].style.display = "none";
          }
        }
        }



          function mySection(num) {
            let text1 = "section";
          let text2 = num;
          let result = text1.concat("", text2);
          let result1 = result.concat("", text1);

          var elements = document.getElementsByClassName(result1);
          for(var i=0; i<elements.length; i++) {

              if(elements[i].style.display==="none")
              {
                elements[i].style.display = "block";
              }
              else {
                elements[i].style.display = "none";
              }
            }
            }
