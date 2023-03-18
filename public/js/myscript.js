

//削除(登録)js
function deleteBtn(){
    var result = window.confirm("本当に削除して宜しいでしょうか？");
    if (result) {
        return true;
    }else{
        return false;
    }
}



function valBtn(){
    try {
        document.getElementById('outMessage').innerHTML = ""; 
        //値の取得確認
        var name = document.getElementById('name').value;
        var kana = document.getElementById('kana').value;
        var tel = document.getElementById('tel').value;
        var email = document.getElementById('email').value;
        var body = document.getElementById('body').value;
        var outMessage = document.getElementById('outMessage');
        // outMessage.remove();
        let emailVal = /^[a-z0-9._*^~-]+@[a-z0-9.-]+$/i;
        let telVal = /^0[0-9]+$/;
        var validFlag = true;

        if(name.length == 0){
            outMessage.insertAdjacentHTML('afterbegin','お名前は必須項目です</br>');
            validFlag = false;
        }else if(name.length > 10){
            outMessage.insertAdjacentHTML('afterbegin','お名前は10文字以内でご入力ください</br>');
            validFlag = false;
        }
        if(kana.length == 0){
            outMessage.insertAdjacentHTML('afterbegin','フリガナは必須項目です</br>');
            validFlag = false;
        }else if(kana.length > 10){
            outMessage.insertAdjacentHTML('afterbegin','フリガナは10文字以内でご入力ください</br>');
            validFlag = false;
        }
        if (!tel.match(telVal)) {
            outMessage.insertAdjacentHTML('afterbegin','電話番号は数字でご入力ください</br>');
            validFlag = false;
        }
        if(email.length == 0){
            outMessage.insertAdjacentHTML('afterbegin','メールアドレスは必須項目です</br>');
            validFlag = false;
        }else if(!email.match(emailVal)){
            outMessage.insertAdjacentHTML('afterbegin','メールアドレスは正しい形式でご入力ください</br>');
            validFlag = false;
        }
        if(body.length == 0){
            outMessage.insertAdjacentHTML('afterbegin','お問合せ内容は必須項目です</br>');
            validFlag = false;
        }

        return validFlag;

    } catch (error) {
        alert(error);
    }

}
