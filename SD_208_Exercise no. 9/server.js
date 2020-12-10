const express = require('express');
const app = express()
const bodyParser = require('body-parser');
const database = require("./services/database");
const Users = require('./models/regitered.model');
const { request, response } = require('express');


app.set("view engine", "ejs");
app.use('/public',express.static('public'))
app.use(bodyParser.urlencoded({ extended: true }))
app.use(bodyParser.json())


app.get('/', (request, response) => {
    response.render("Form", {
        data: []
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
    if(error.length>0){
       return response.render("Form",{
            data: error
        })     
    }
    next()
}
app.post('/home', validate, async (request, response) => {
    try{
        let newUser = new Users({
            firstname: request.body.fName,
            lastname: request.body.lName,
            email: request.body.email,
            password: request.body.pass
        })
        const result = await newUser.save();
        if (!result) {
            return response.status(400).json({
                error: "Error in adding new user!",
            });
        }
        response.redirect('/home')
    }catch(e){
        return response.status(400).json({
            error: e,
        });
    }  
})

app.get('/home',async(request,response)=>{
    try{
        const users = await Users.find();
        response.render('home',{
            users: users
        })
    }catch(e){
        return response.status(400).json({
            error: e,
        });
    }
})

app.get('/delete/:id', async(request,response)=>{
    try{
        await Users.deleteOne({_id: request.params.id},(error,result)=>{
            if(error){
                return response.status(400).json({
                    error: error,
                });
            }
            response.redirect('/home')
        })
    }catch(e){

    }
})
var id;
app.get('/update/:id', async(request,response)=>{
    try{
        id = request.params.id
        const result = await Users.findOne({_id:request.params.id})
        response.render('Update',{
            user: result,
            data: []
        })
    }catch(e){
        return response.status(400).json({
            error: e
        })
    }
})
let validateUpdate = async(request, response, next) => {
    var error = [];
    if(request.body.firstname.length <=2 || request.body.firstname.length>25){
        error.push("Your firstname must be at least 2 characters and not exceed to 25 characters!")
    }
    if(request.body.lastname.length <=2 || request.body.lastname.length >25){
        error.push("Your lastname must be at least 2 characters and not exceed to 25 characters!")
    }
    if(error.length>0){
        const result = await Users.findOne({_id: id});
       return response.render("Update",{
            data: error,
            user: result
        })     
    }
    next()
}

app.post('/updated', validateUpdate, async(request,response)=>{
    try {
        const result = await Users.updateOne({ _id: request.body.id }, { $set: request.body });
        if (!result) {
            return response.status(400).json({
                error: "Error in updating user!",
            });
        }

        response.redirect("/home")

    } catch (e) {
        return response.status(400).json({
            error: e,
        });
    }
})
database.connect();
// let authenticate = (request, response,next) => {
//     const findOne = infoList.find((user)=>{
//         return user.email === request.body.email && user.password === request.body.password     
//     })
//     if(findOne){
//         return next();
//     }
//     return response.render('login',{
//         error: "Account did not exist!",
//         title: "Log In Form"
//     })
// }

// app.post('/home', authenticate, (request, response) => {
//     try{
//         response.render('home', {
//                 data: infoList[infoList.length - 1],
//                 title: "Home Page"
//             })
//     }catch(e){
//         console.log(e)
//     }
    

// })

app.listen(8000, console.log("Listening at port 8000"));