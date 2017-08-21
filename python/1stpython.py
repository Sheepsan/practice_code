


def compare(num):
	text=str(num) + ":"  #PHPのようにintとstringの勝手な結合はしてくれない
	if num<5:
		text+="less than 5"
	elif num<10:
		text+="less than 10"
	elif num<20:
		text+="less than 20"
	else:
		text+="eq or more than 20"
	return text

#先にメソッドを書いておかないと未定義エラーになる

a=8
print(compare(a))