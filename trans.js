var val="";

oldlast2='';
oldlast='';
last='';
curr='';
querykey='';
amharic= {"ha":"ሀ" ,"hu": "ሁ" , "hi": "ሂ", "hA": "ሃ", "hE":"ሄ" ,"h":"ህ", "ho":"ሆ" ,
"le": "ለ", "lu":"ሉ", "li":"ሊ", "la":"ላ", "lE": "ሌ", "l":"ል", "lo":"ሎ", 
".ha":"ሐ", ".hu":"ሑ", ".hi":"ሒ", ".ha":"ሓ", ".hE": "ሔ", ".h":"ሕ", "ho":"ሖ",
"me":"መ", "mu":"ሙ", "mi":"ሚ", "ma":"ማ", "mE": "ሜ", "m":"ም", "mo":"ሞ",
 "'se":"ሠ", "'su":"ሡ", "'si":"ሢ","'sa":"ሣ","'sE": "ሤ" ,"'s":"ሥ","'so":"ሦ",
 "re":"ረ", "ru":"ሩ", "ri":"ሪ", "ra": "ራ", "rE":"ሬ", "r":"ር", "ro":"ሮ",
 "se":"ሰ", "su":"ሱ", "si":"ሲ", "sa":"ሳ", "sE":"ሴ", "s":"ስ", "so":"ሶ", 
"^se":"ሸ", "^su":"ሹ","^si":"ሺ","^sa":"ሻ","^sE":"ሼ","^s":"ሽ","^so":"ሾ",
"qe":"ቀ", "qu":"ቁ", "qi":"ቂ", "qa":"ቃ", "qE":"ቄ", "q":"ቅ", "qo":"ቆ",
"be":"በ", "bu":"ቡ", "bi":"ቢ", "ba":"ባ", "bE":"ቤ", "b":"ብ", "bo":"ቦ",
"ve":"ቨ", "vu":"ቩ", "vi":"ቪ","va":"ቫ", "vE":"ቬ", "v":"ቭ", "vo":"ቮ",
"te":"ተ","tu":"ቱ", "ti":"ቲ", "ta":"ታ", "tE":"ቴ", "t":"ት", "to":"ቶ",
"^ce":"ቸ", "^cu":"ቹ","^ci":"ቺ","^ca":"ቻ","^cE":"ቼ","^c":"ች","^co":"ቾ",
"_ha":"ኀ","_hu":"ኁ","_hi":"ኂ","_ha":"ኃ","_hE":"ኄ","_h":"ኅ","_ho":"ኆ",
"ne":"ነ","nu":"ኑ","ni":"ኒ","na":"ና","nE":"ኔ","n":"ን","no":"ኖ",
"~ne":"ኘ","~nu":"ኙ","~ni":"ኚ","~na":"ኛ","~nE":"ኜ","~n":"ኝ","~no":"ኞ",
"'a":"አ","'u":"ኡ", "'i":"ኢ","'A":"ኣ", "'E":"ኤ", "'e":"እ", "'o":"ኦ", 
"a":"አ", "u":"ኡ", "i":"ኢ" ,"A":"ኣ", "E":"ኤ", "e":"እ", "o":"ኦ",
"ke":"ከ", "ku":"ኩ","ki":"ኪ", "ka":"ካ", "kE":"ኬ", "k":"ክ", "ko":"ኮ",
"_ke":"ኸ","_ku":"ኹ","_ki":"ኺ", "_ka":"ኻ","_kE":"ኼ","_k":"ኽ", "_ko":"ኾ",
"we":"ወ","wu":"ዉ","wi":"ዊ","wa":"ዋ","wE":"ዌ","w":"ው","wo":"ዎ",
"ze":"ዘ" , "zu":"ዙ", "zi":"ዚ", "za":"ዛ", "zE":"ዜ", "z":"ዝ", "zo":"ዞ",
"^ze":"ዠ" , "^zu":"ዡ","^zi":"ዢ","^za":"ዣ","^zE":"ዤ","^z":"ዥ", "^zo":"ዦ",
"ye":"የ", "yu":"ዩ", "yi":"ዪ", "ya":"ያ","yE":"ዬ","y":"ይ", "yo":"ዮ",
 "de":"ደ","du":"ዱ", "di":"ዲ", "da":"ዳ", "dE":"ዴ", "d":"ድ", "do":"ዶ",
"^ge":"ጀ", "^gu":"ጁ", "^gi":"ጂ", "^ga":"ጃ","^gE":"ጄ", "^g":"ጅ", "^go":"ጆ",
"ge":"ገ", "gu":"ጉ","gi":"ጊ","ga":"ጋ","gE":"ጌ","g":"ግ","go":"ጎ",
".te":"ጠ", ".tu":"ጡ", ".ti":"ጢ", ".ta":"ጣ",".tE":"ጤ",".t":"ጥ",".to":"ጦ",

"^Ce":"ጨ", "^Cu":"ጩ","^Ci":"ጪ","^Ca":"ጫ","^CE":"ጬ","^C":"ጭ","^Co":"ጮ",

".pe":"ጰ", ".pu":"ጱ",".pi":"ጲ", ".pa":"ጳ", ".pE":"ጴ", ".p":"ጵ", ".po":"ጶ",
".se": "ጸ", ".su":"ጹ", ".si":"ጺ",".sa":"ጻ",".sE":"ጼ",".s":"ጽ",".so":"ጾ",
".ce":"ፀ",".cu":"ፁ", ".ci":"ፂ", ".ca":"ፃ",".cE":"ፄ", ".c":"ፅ", ".co":"ፆ",
"fe":"ፈ", "fu":"ፉ", "fi":"ፊ", "fa":"ፋ", "fE":"ፌ","f":"ፍ", "fo":"ፎ",
"pe":"ፐ",  "pu":"ፑ", "pi":"ፒ", "pa":"ፓ", "pE":"ፔ", "p":"ፕ", "po":"ፖ",
"hua":"ሗ", "lua":"ሏ", "mua":"ሟ", "'sua":"ሧ", "rua":"ሯ", "sua":"ሷ", "^sua":"ሿ",
"qua":"ቋ", "bua":"ቧ", "vua":"ቯ", "tua":"ቷ", "^cua":"ቿ", "_hua":"ኋ", "nua":"ኗ",
"~nua":"ኟ", "kua":"ኳ", "_kua":"ዃ","zua":"ዟ", "^zua":"ዧ", "dua":"ዷ","^gua":"ጇ",
"gua":"ጓ", ".tua":"ጧ", "^Cua":"ጯ", ".pua":"ጷ",".sua":"ጿ", "fua":"ፏ","pua":"ፗ" 
 } ;

function transliterate( ob){

            oldlast2= oldlast;
		oldlast=last;
		last = curr;
       val= document.getElementById(ob).value;
	          curr= val.charAt(val.length-1);
                if(last=="ጭ"){last="C"; oldlast='^'} //shift key problem
	 	
  
      
		valu="";
	//if(curr=='a') alert (last);
      if (!isVowel(curr) && !isMarker(curr)) {
			if(isMarker(last)) 
			    querykey= last+curr;
				 
			 else querykey= curr;
			}	
	   if (isVowel(curr)) {
			 
			if(isVowel(last)){
			 if(last=='u' && curr=='a'){
					if(isMarker(oldlast2))
			     		 querykey= oldlast2+ oldlast+ last+ curr;
			      		 else querykey= oldlast+last + curr;
						}
				
			else  querykey= curr;	 //two consequetive vowels
				}	 
                        
           		else if (!isVowel(last) && !isMarker(last)) { //if last is not vowel
					if (isMarker(oldlast)) querykey = oldlast + last + curr;
					 else querykey= last+ curr;
					}
				else querykey= last+curr;
		if(last==' '|| last=='\n') querykey= curr;
		      		     		}
				//alert(querykey);
	       if(isMarker(curr)) querykey="";
		//if(!isMarker(curr))
		valu = amharic[querykey];
		mylen = val.length- querykey.length;
		if(querykey.length==3)
		 mylen+=1;
		if(querykey.length==4) mylen+=2;
		
		if(valu){
				
		val= val.substr(0,mylen)
		val= val + valu;
		}
		
	document.getElementById(ob).value= val;
   
	
 	}
function isMarker( va){
	if(va=='_' || va =='^' || va == '.' || va == "'" || va =='~')
	return true;
	else return false;
}
function isVowel(va) {
	
if (va =='a' || va == 'A' || va=='e' || va=='E'|| va=='u' || va == 'o' || va=='i')
	return true;
    else return false;
}
function O(obj)
{
if (typeof obj == 'object') return obj
else return document.getElementById(obj)
}
function S(obj)
{
return O(obj).style
}
function C(name)
{
var elements = document.getElementsByTagName('*')
var objects = []
for (var i = 0 ; i < elements.length ; ++i)
if (elements[i].className == name)
objects.push(elements[i])
return objects
}