/**
 * recover.c
 *
 * Computer Science 50
 * Problem Set 4
 *
 * Recovers JPEGs from a forensic image.
 */
#include <stdio.h>
#include <stdlib.h>


int main(int argc, char* argv[])
{
    // open input file 
    FILE* inptr = fopen("card.raw", "r");
    if (inptr == NULL)
    {   
        fclose(inptr);
        printf("Could not open the file.");
        return 1;
    }

    unsigned char buffer[512];
    

    
  
    int fileNumber = 0;
    FILE *img = NULL;
    
    
    while(fread(&buffer, sizeof(buffer), 1, inptr))
      {
         
        if (buffer[0] == 0xff && buffer[1] == 0xd8 && buffer[2] == 0xff
            && (buffer[3] == 0xe0 || buffer[3] == 0xe1))
            {
               if(img!= NULL)
                  fclose(img);
      
                  
               char title[8];
               sprintf(title, "%03d.jpg", fileNumber);
               fileNumber++;
               img = fopen(title, "a");
                  
            }
          
        if(img!= NULL)   
         {
               fwrite(&buffer, sizeof(buffer), 1, img);
         }
      }
    
      if(img!= NULL)
      {
         fclose(img);
      }
      fclose(inptr);
     
      return 0;
   
       
   
}
