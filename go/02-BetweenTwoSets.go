package main

import "fmt"

func getGCD(a,b int32) int32{
	var d, div int32;

	d = a;
	div = b;

	if(a>b){
		d = b;
		div = a;
	}

	var residuo int32;

	for{
		residuo = div % d;
		div = d
		d = residuo;
		if residuo == 0 {
			break
		}
	}

	return div;
}


func main(){
	var a, b int32;
	
	a = 108
	b = 14

	lcm := getGCD(a,b)

	if  a % lcm == 0 && 
		b % lcm == 0{
			fmt.Println("El GCM es: ", lcm);
	}else{
		fmt.Println("No se encontró GCM")
	}
}
