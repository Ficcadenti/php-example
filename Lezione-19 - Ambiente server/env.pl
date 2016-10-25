#!perl.exe

print ("PID: $$");
print ("\n");

print("Elenvo variabili ambientali: \n\n\n");

foreach( keys %ENV)
{
  print "$_:$ENV{$_}\n";
}