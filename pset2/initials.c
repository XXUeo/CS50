#include <stdio.h>
#include <cs50.h>
#include <string.h>
#include <ctype.h>


int main(void){
      
      string s = GetString();
      //getinput
      for(int i = 0, n =strlen(s); i < n; i++){
            //check blank and make the next letter capital
            if(s[i] == ' '){
            
                  printf("%c",toupper(s[i+1]));
                  
            }
            //for first letter
            else if(i == 0){
            
                  printf("%c",toupper(s[0]));
                  
            }else;
            
      } 
     
     
     printf("\n");
}