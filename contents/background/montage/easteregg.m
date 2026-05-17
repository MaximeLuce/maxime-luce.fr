function [messageDecode] = decodageCanal(messageCode, doublon)       %#ok<STOUT,FNDEF,INUSD>
    H = [1 0 1 0 1 0 1; 0 1 1 0 0 1 1; 0 0 0 1 1 1 1];              %#ok<NASGU>
    disp("newwindow");
    messageDecode = look(messageCode,doublon,H);
end