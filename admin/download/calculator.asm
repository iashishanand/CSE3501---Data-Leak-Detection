include emu8086.inc
DATA SEGMENT 
ENDS    
CODE SEGMENT
ASSUME DS:DATA CS:CODE
    START:   
    
        MOV SI, 0500h          
        MOV AX, 0000h       
        MOV CL, [SI] 
        INC SI
        
        CMP CL, 01h
        JZ Add8 
        
        CMP CL, 02h
        JZ Sub8
         
        CMP CL, 03h
        JZ Add16
        
        CMP CL, 04h
        JZ Sub16  
        
        CMP CL, 05h
        JZ Mul8 
        
        CMP CL, 06h
        JZ Mul16  
        
        CMP CL, 07h
        JZ Div16  
        
        CMP CL, 08h
        JZ Div32
        
        
        Add8:        
            MOV AL, [SI]
            INC SI
            ADD AL, [SI]
            print "8-bit addition result is stored in AL..."       
            HLT
            
        Sub8:
            MOV AL, [SI]
            INC SI
            SUB AL, [SI]
            print "8-bit substraction result is stored in AL..."        
            HLT
            
        Add16:
            MOV AX, [SI]
            ADD SI, 02h
            ADD AX, [SI]
            print "16-bit addition result is stored in AX..."
            HLT
              
        Sub16: 
            MOV AX, [SI]
            ADD SI, 02h
            SUB AX, [SI] 
            print "16-bit substracton result is stored in AX..."
            HLT 
            
        Mul8:
            MOV AL, [SI]
            INC SI 
            MOV BL, [SI]
            MUL BL
            print "8-bit multiplication result is stored in AX..."
            HLT 
            
        Mul16:
            MOV AX, [SI]
            ADD SI, 02h 
            MOV BX, [SI]
            MUL BX
            print "16-bit multiplication result is stored in DX-AX..." 
            HLT
            
        Div16: 
            MOV AX, [SI]
            ADD SI, 02h
            MOV BL, [SI]
            DIV BL
            print "16-bit/8-bit division result is stored in AH-Remainder and AL-Quotient..." 
            HLT
            
        Div32:
            MOV AX, [SI]
            ADD SI, 02h
            MOV DX, [SI]
            ADD SI, 02h
            MOV BX, [SI]
            DIV BX
            print "32-bit/16-bit division result is stored in DX-Remainder and AX-Quotient..." 
            HLT   
                           
                         
     CODE ENDS
END START