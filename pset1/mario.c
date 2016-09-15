#include <stdio.h>
#include <cs50.h>

int main(void)
{ //bariables
   int height;//numberInput
   int height_number;//number of levels named from top
   int brank;
   int hushtag;
  
      
      //limit input
      do
      {
            printf("type number between 1 and 23!\n");
            height = GetInt();
            
      }
      while(height < 0 || height > 23);
      
      //name each level by natural numbers from the top
      for(height_number = 1; height_number < height+1; height_number++)
      {
            
           
            //number of brank
            for(brank = (height - height_number); brank > 0; brank--)
            {
                  
                  printf(" ");
                  
                  
            }
            //number of hushtag
            for(hushtag = 1; hushtag <=height_number+1; hushtag++)
            {
                  printf("#");
                  
            }
            //go down to next level 
            printf("\n");
            
            
      }
      
      return 0;
      
}