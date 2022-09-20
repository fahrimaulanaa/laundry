import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;

public class bardet {
    
    private static BufferedReader br = null;
    
    public static void main(String[] args) {
        System.out.println("====================================");
        System.out.println("Program Barisan dan Deret Aritmatika");
        System.out.println("====================================");
        System.out.println();
        
        boolean cek = true;
        while (cek) {
            br = new BufferedReader(new InputStreamReader(System.in));
            try {
                System.out.print("Masukkan suku pertama (a) : ");
                int a = Integer.parseInt(br.readLine());

                System.out.print("Masukkan nilai beda (b)   : ");
                int b = Integer.parseInt(br.readLine());

                System.out.print("Masukkan banyak suku (n)   : ");
                int n = Integer.parseInt(br.readLine());

                System.out.println();

                int Un = a + (n-1) * b;
                System.out.println("Nilai suku ke-" + n + " (U" + n + ") adalah    : " + Un);
                
                int Sn = (a+Un) * n / 2;
                System.out.println("Jumlah " + n + " suku pertama (S" + n +") adalah : " + Sn);
                System.out.println();

                System.out.print("Ingin coba lagi (Y/N) ? ");

                String coba = br.readLine();
                if (coba.equalsIgnoreCase("N"))
                    cek = false;
                else if (coba.equalsIgnoreCase("Y"))
                    cek = true;
                else
                    System.exit(0);
            }
            catch (IOException ioe) {
                System.out.println("Error IOException");
            }
        }
    }
}