function deleteBtn(){
    var result = window.confirm("本当に削除して宜しいでしょうか？");
    if (result) {
        return true;
    }else{
        return false;
    }
}