VERSION 5.00
Begin VB.Form Form4 
   Caption         =   "Form4"
   ClientHeight    =   3030
   ClientLeft      =   120
   ClientTop       =   450
   ClientWidth     =   11880
   LinkTopic       =   "Form4"
   ScaleHeight     =   3030
   ScaleWidth      =   11880
   StartUpPosition =   3  'Windows Default
   Begin VB.Label Label3 
      Caption         =   "cleint"
      Height          =   375
      Left            =   3000
      TabIndex        =   2
      Top             =   2400
      Width           =   2535
   End
   Begin VB.Label Label2 
      Caption         =   "compte"
      Height          =   495
      Left            =   3000
      TabIndex        =   1
      Top             =   1440
      Width           =   2295
   End
   Begin VB.Label Label1 
      Caption         =   "MENU"
      Height          =   495
      Left            =   2880
      TabIndex        =   0
      Top             =   360
      Width           =   2535
   End
End
Attribute VB_Name = "Form4"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Private Sub Label1_Click()
Load Form1
Form1.Show
End Sub

Private Sub Label2_Click()
Load Form1
Form1.Show
End Sub

Private Sub Label3_Click()
Load Form2
Form2.Show
End Sub
