#include <stdio.h>
#include <cs50.h>
#include <string.h>
#include <stdlib.h>
#include <ctype.h>

void converter(int key);
//get key for cipher as converter
int main(int argc, string argv[])
{
    //in there is no or more input in argc 2, return error
    if(argc != 2)
      {
       printf("error\n");
       return 1;
            
      }
    else
     {
       int inputKey = atoi(argv[1]);//store key to inputkey
       
     
      converter(inputKey);
       
      return 0;
      }
      
}


void converter(int key)
{
      //ask user to input strings
      string inputSt = GetString();
     
  
       
      for(int i = 0, n = strlen(inputSt); i < n;  i++)
      {
       
            
            //make sure wether character or not   
            if(isalpha(inputSt[i]))
            {
                  if(isupper(inputSt[i]))//for uppercase
                  {
                        
                        printf("%c",((inputSt[i]-65+key)%26)+65);
                        //convert to Ascii, changer to alphabetical index and add key, then return to Asci
                  }
                  else //for lowercase
                  {
                        
                        printf("%c",((inputSt[i]-97+key)%26)+97);
                  }
            }
            
            
            else//for not character
            {
                  
                  printf("%c",inputSt[i]);
                  
            }
      }
      
      printf("\n");

}
      
      
      
