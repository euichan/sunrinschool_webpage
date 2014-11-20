function CheckPassWord()
{
ObjUserID = document.getElementsByName("id")[0];
    ObjUserPassWord  = document.getElementsByName("password")[0];
    objUserPassWordRe = document.getElementsByName("passwordcheck")[0];
    if(ObjUserPassWord.value != objUserPassWordRe.value)
    {
        alert("입력하신 비밀번호와 비밀번호확인이 일치하지 않습니다");
        return false;
    }

    if(ObjUserPassWord.value.length<6)
    {
        alert("비밀번호는 문자, 숫자, 특수문자의 조합으로 6~16자리로 입력해주세요.");
        return false;
    }

    if(!ObjUserPassWord.value.match(/([a-zA-Z0-9].*[!,@,#,$,%,^,&,*,?,_,~])|([!,@,#,$,%,^,&,*,?,_,~].*[a-zA-Z0-9])/))
    {
        alert("비밀번호는 문자, 숫자, 특수문자의 조합으로 6~16자리로 입력해주세요.");
        return false;
    }

    if(ObjUserID.value.indexOf(ObjUserPassWord) > -1)
    {
        alert("비밀번호에 아이디를 사용할 수 없습니다.");
        return false;
    }
    var SamePass_0 = 0; //동일문자 카운트
    var SamePass_1 = 0; //연속성(+) 카운드
    var SamePass_2 = 0; //연속성(-) 카운드



    var chr_pass_0;
    var chr_pass_1;

    var chr_pass_2;


    for(var i=0; i < ObjUserPassWord.value.length; i++)
    {
        chr_pass_0 = ObjUserPassWord.value.charAt(i);
        chr_pass_1 = ObjUserPassWord.value.charAt(i+1);

        //동일문자 카운트
        if(chr_pass_0 == chr_pass_1)
        {
            SamePass_0 = SamePass_0 + 1
        }


        chr_pass_2 = ObjUserPassWord.value.charAt(i+2);
        //연속성(+) 카운드

        if(chr_pass_0.charCodeAt(0) - chr_pass_1.charCodeAt(0) == 1 && chr_pass_1.charCodeAt(0) - chr_pass_2.charCodeAt(0) == 1)
        {
            SamePass_1 = SamePass_1 + 1
        }

        //연속성(-) 카운드
        if(chr_pass_0.charCodeAt(0) - chr_pass_1.charCodeAt(0) == -1 && chr_pass_1.charCodeAt(0) - chr_pass_2.charCodeAt(0) == -1)
        {
            SamePass_2 = SamePass_2 + 1
        }
    }
    if(SamePass_0 > 1)
    {
        alert("동일문자를 3번 이상 사용할 수 없습니다.");
        return false;
    }

    if(SamePass_1 > 1 || SamePass_2 > 1 )
    {
        alert("연속된 문자열(123 또는 321, abc, cba 등)을\n 3자 이상 사용 할 수 없습니다.");
        return false;
    }
 return false;

}
