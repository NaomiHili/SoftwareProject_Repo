
function formValidation()
{
    var Name = document.forms["registration"]["pname"].value;
    var Surname = document.forms["registration"]["psurname"].value;
    var HouseName = document.forms["registration"]["housename"].value;
    var Street = document.forms["registration"]["street"].value;
    var PostCode = document.forms["registration"]["Postcode"].value;
    var MobileNum = document.forms["registration"]["mobileNumber"].value;
    var Email = document.forms["registration"]["email"].value;
    var Username = document.forms["registration"]["username"].value;
    var Password = document.forms["registration"]["password"].value;
 
    
    if(Name == "" || Surname = "" || HouseName == "" || Street == "" || PostCode == "" || MobileNum == "" || Email == "" 
       || Username == "" || Password == "")
    {
        alert("All felds must be filled out");
        return false;
    }
}



