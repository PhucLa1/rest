//Tao bo chon cho query selector
const $=document.querySelector.bind(document)
const $$=document.querySelectorAll.bind(document)

//Tạo các biến để sử dụng cho sau này
var fullName = $('input[name ="fullname"]');
var age =  $('input[name ="age"]');
var gender = $('input[name="gender"]')
var phone =$('input[name="phone"]')
var email =$('input[name="email"]')
var favor= $$('input[name="favor"]')
var home = $('#home')
var show= $$('input[name="show"]')
var pass= $('input[name="pass"]')
var rePass=$('input[name="repass"]')
var date =$('#date')
var user=$('input[name ="username"]')
// check_pass=/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/
// Mật khẩu bao gồm các ký chữ cái, chữ số, ký tự đặc biệt, dấu chấm
// Bắt đầu bằng ký tự in hoa
// Độ dài 6-32 ký tự
function checkNull(dataInput){
    if(dataInput.length==0){
        return false;
    }
}

function renderError(selector){
    $(`.${selector}`).classList.add('active')
    $(`.${selector}`).classList.remove('nonactive')
}
function Success(selector){
    $(`.${selector}`).classList.remove('active')
    $(`.${selector}`).classList.add('nonactive')
}


//Bieu thuc chinh quy cho cac quy tac cua cac o dien cho trong
var check_Pass=/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9]{8})$/
var check_Phone = /(84|0[3|5|7|8|9])+([0-9]{8})\b/;
var check_Name= /^[a-z0-9_-]{3,16}$/
var check_Email=/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

//Kiem tra ten
function checkName() {
    let valueOfName = fullName.value;
    if (checkNull(valueOfName) == false) {
        renderError('null-name')
        return false;
    } else {
        Success('null-name')
        return true;
    }
}
function checkUser() {
    let valueOfName = user.value;
    if (checkNull(valueOfName) == false) {
        renderError('null-name')
        return false;
    } else {
        Success('null-name')
        return true;
    }
}
//Kiem tra tuoi
    function checkAge(){
        let valueOfAge= (age.value);
        if(checkNull(valueOfAge)==false){
            renderError('null-age')
            Success('wrong-age')
        }
        else{
            Success('null-age')
            if(valueOfAge<16){
                renderError('wrong-age')
            }
            else{
                Success('wrong-age')
            }
        }
    }

//Kiem tra so dien thoai
    function checkPhone(){
        let valueOfPhone = phone.value;
        if(checkNull(valueOfPhone)==false){
            renderError('null-phone')
            Success('wrong-phone')
        }
        else{
            Success('null-phone')
            if(!check_Phone.test(valueOfPhone)){
                renderError('wrong-phone')
            }
            else{
                Success('wrong-phone')
            }
        }
    }

//Kiem tra email
    function checkEmail(){
        let valueOfEmail = email.value;
        if(checkNull(valueOfEmail)==false){
            renderError('null-email')
            Success('wrong-email')
            return false;
        }
        else{
            Success('null-email')
            if(!check_Email.test(valueOfEmail)){
                renderError('wrong-email')
                return false;
            }
            else{
                Success('wrong-email')
                return true;
            }
        }
    }

//Kiem tra gioi tinh
    function checkGender(){
        let male= $('#male')
        let female= $('#female')
        if(!male.checked && !female.checked){
            renderError('null-gender')
        }
        else{
            Success('null-gender')
        }
    }

//Kiem tra gioi tinh
    function checkFavor(){
        var check=false;
        for(var i=0;i<favor.length;i++){
            if(favor[i].checked){
                check=true;
            }
        }
        if(check==false){
            renderError('null-favor');
        }
        else{
            Success('null-favor')
        }
    }

//Kiem tra que quan
    function checkHome(){
        if(home.value==0){
            renderError('null-home');
        }
        else{
            Success('null-home')
        }
    }

//show pass
    function showPass(){
        if(show[0].checked){
            pass.type='text'
        }
        else{
            pass.type='password'
        }
    }

//Show repass
    function showRePass(){
        if(show[1].checked){
            rePass.type='text'
        }
        else{
            rePass.type='password'
        }
    }

//Kiem tra pass
    function checkPass(){
        let valueOfPass=pass.value
        let law2=/[0-9]/
        let law3=/[A-Z]/
        let law4=/[\W]/
        // alert(valueOfPass.length)
        if(checkNull(valueOfPass)==false){
            renderError('null-pass');
            Success('wrong-pass1')
            return false;

        }
        else{
            Success('null-pass')
            if(valueOfPass.length <6){
                renderError('wrong-pass1')
                return false;
            }
            else{
                Success('wrong-pass1')
                return true;
            }
        }
    }

//Kiem tra repass
    function checkRePass(){
        let valueOfRePass= rePass.value
        if(checkNull(valueOfRePass)==false){
            renderError('null-repass')
            Success('wrong-repass')
            return false;
        }
        else{
            Success('null-repass')
            if(valueOfRePass!=pass.value){
                renderError('wrong-repass')
                return false;
            }
            else{
                Success('wrong-repass')
                return true;
            }
        }
    }


//Kiem tra ngay thang nam sinh
    function checkDate(){
        let valueOfDate= date.value.split("-")
        let currYear=new Date().getFullYear()
        let day=valueOfDate[2]
        let month=valueOfDate[1]
        let year=valueOfDate[0]
        if(valueOfDate.length==1){
            renderError('null-date')
            Success('wrong-date')
        }
        else{
            Success('null-date')
            if(currYear-year<18){
                renderError('wrong-date')
            }
            else{
                Success('wrong-date')
            }
        }
    }
//Kiem tra toan the luc submit
    function checkSubmit(){
        if(checkName()==false || checkEmail()==false || checkUser()==false || checkPass()==false || checkRePass()==false){
            $('.logup').action=`postlogup.php?home=0`;
        }
        else{
            $('.logup').action=`postlogup.php?home=1`;
        }
    }


function previewImage(){
    var file=document.getElementById('customFile').files;
    if(file.length>0){
        var fileReader=new FileReader()
        fileReader.onload=function (event){
            document.getElementById('preview').setAttribute('src',event.target.result)
        }
        fileReader.readAsDataURL(file[0]);
    }
}











