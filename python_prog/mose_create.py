import polib

import Translate_Object
import string
import re
import collections
import sys
reload(sys)
sys.setdefaultencoding('utf-8')




#with open('/Users/thaothai/Desktop/Terminology_Creation/translated_files/langfiles.txt') as name:
#      namefile = name.read().splitlines()
dict = ["gn_BO","gn_PY","ha","haw","he","hi_IN","hr","hsb","ht","hu","hy_AM","id","ig","is","km","kn","ks","ku","lg","lt","lv","mg","ml","mr","ms","my","nb_NO","ne","ny","or","pa","ps","pt","rn","ro","rw","scn","si","sl","sm","sr","ss","su","sv","sw","ta","te","tk","tl","tn","tr","ts","tt","ur","uz","vec","vi","wa","wo","xh","yo","zu"]
dict = ["ach","af","ak","ar","az","bg","bm","bn_BD","bs","ca","dsb","es_MX","eu","fa","ff","fj","ga-IE","gn_BO","gn_PY","ha","haw","he","hi_IN","hr","hsb","ht","hu","hy_AM","id","ig","is","km","kn","ks","ku","lg","lt","lv","mg","ml","mr","ms","my","nb_NO","ne","ny","or","pa","ps","pt","rn","ro","rw","si","sl","sm","sr","ss","su","sv","sw","ta","te","tk","tl","tn","tr","ts","tt","ur","uz","vec","vi","wa","wo","xh","yo","zu"]
for i in dict:
    print i
#for text in namefile:
    with open('/Users/thaothai/Desktop/Terminology_Creation/translated_files/languages/%s.txt'%(i)) as f:
        pofiles =  f.read().splitlines()
        SourceFile = open('/Users/thaothai/Desktop/Terminology_Creation/results/%s/working/%s-en.en'%(i,i), 'w')
        TargetFile = open('/Users/thaothai/Desktop/Terminology_Creation/results/%s/working/%s-en.%s'%(i,i,i), 'w')
        Output = open('/Users/thaothai/Desktop/Terminology_Creation/results/%s/%s-output'%(i,i), 'w')
        for po_file in pofiles:
            print("File name is " + po_file + "\n")
            po = polib.pofile(po_file)
            NumberOfSentences= len(po.translated_entries())
            if NumberOfSentences == 0:
                continue
                #Create a list for english and translated terms
            for entry in po.translated_entries():
                english = re.sub("[0-9]|[%$&;:#!\]\[@?<>*\\=+,-\.\)\(]|[...]|[--]|{}|","", entry.msgid.encode('utf-8'))
                english = english.replace('\n', ' ')
                target = re.sub("[0-9]|[%$&;:#!\]\[@?<>*\\=+,-\.\)\(]|[...]|[--]|{}","", entry.msgstr.encode('utf-8'))
                target = target.replace('\n', ' ')
                Source = english
                print(Source)
                Target = target
                print(Target)
                SourceCount = len(Source.split(" "))
                TargetCount = len(Target.split(" "))
                if SourceCount == 1 and len(Source) > 1:
                    Output.write(Source + ";" + Target + "\n")
                elif SourceCount > 1 and TargetCount > 0:
                    SourceFile.write(Source + "\n")
                    TargetFile.write(Target + "\n")
                #elif SourceCount == 1 and TargetCount > 0:
                    #Output.write(Source+";"+Target+"\n")
    SourceFile.close()
    TargetFile.close()
    Output.close()