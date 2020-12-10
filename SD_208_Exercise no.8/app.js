const app = require('express')();
const bodyParser = require('body-parser');
const morgan = require('morgan')
// const { request } = require('express');
app.set("view engine", "ejs");
app.use(bodyParser.urlencoded({ extended: true }))
app.use(bodyParser.json())
app.use(morgan("tiny"))
var infoList = [];
app.get('/', (request, response) => {
    response.render("Register", {
        data: [],
        title: "Registration Form"
    })
})
let validate = (request, response, next) => {
    var error = [];
    if(request.body.fName.length <=2 || request.body.fName.length>25){
        error.push("Your firstname must be at least 2 characters and not exceed to 25 characters!")
    }
    if(request.body.lName.length <=2 || request.body.lName.length >25){
        error.push("Your lastname must be at least 2 characters and not exceed to 25 characters!")
    }
    if(request.body.email != request.body.cemail){
        error.push("Email didn't match!")
    }if(request.body.password != request.body.cpassword){
        error.push("Password didn't match!")
    }
    if(error.length>0){
       return response.render("Register",{
            data: error,
            title: "Registration Form"
        })     
    }
    next()
}
app.post('/login', validate, (request, response) => {
    infoList.push(request.body)
    // console.log(infoList)
    response.render('login', {
        error: "",
        title: "Log In Form"
    })
})

let authenticate = (request, response,next) => {
    const findOne = infoList.find((user)=>{
        return user.email === request.body.email && user.password === request.body.password     
    })
    if(findOne){
        return next();
    }
    return response.render('login',{
        error: "Account did not exist!",
        title: "Log In Form"
    })
}

app.post('/home', authenticate, (request, response) => {
    try{
        response.render('home', {
                data: infoList[infoList.length - 1],
                title: "Home Page"
            })
    }catch(e){
        console.log(e)
    }
    

})

app.listen(8000, console.log("Listening at port 8000"));