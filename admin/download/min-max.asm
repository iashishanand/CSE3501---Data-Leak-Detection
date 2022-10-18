Data SEGMENT  
Data ENDS  

Code SEGMENT
    ASSUME CS:Code, DS:Data, ES:Extra
    START: 
        ; For calculating maximum in the array
        MOV SI, 500h            
        MOV DI, 600h 
        MOV CX, 0000h
        MOV CL, [SI]
        INC SI
        MOV AL, [SI]
        DEC CX
        INC SI
        BACK1: CMP AL, [SI]
               JNC SKIP1
               MOV AL, [SI]  
        SKIP1: INC SI
               LOOP BACK1
              MOV [DI], AL
              INC DI  
              
        ; For calculating minimum in the array
        MOV SI, 500h  
        MOV CX, 0000h          
        MOV CL, [SI]
        INC SI
        MOV AL, [SI]
        DEC CX
        INC SI
        BACK2: CMP AL, [SI]
               JC SKIP2
               MOV AL, [SI]  
        SKIP2: INC SI
               LOOP BACK2
              MOV [DI], AL      
            
     Code ENDS
END START