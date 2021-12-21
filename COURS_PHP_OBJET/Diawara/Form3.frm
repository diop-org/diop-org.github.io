VERSION 5.00
Begin VB.Form Form3 
   Caption         =   "Form3"
   ClientHeight    =   4050
   ClientLeft      =   120
   ClientTop       =   450
   ClientWidth     =   10215
   LinkTopic       =   "Form3"
   ScaleHeight     =   4050
   ScaleWidth      =   10215
   StartUpPosition =   3  'Windows Default
   Begin VB.CommandButton Command1 
      Caption         =   "connexion"
      Height          =   375
      Left            =   600
      TabIndex        =   5
      Top             =   3360
      Width           =   1335
   End
   Begin VB.TextBox pas 
      Height          =   285
      IMEMode         =   3  'DISABLE
      Left            =   2880
      TabIndex        =   4
      Top             =   2280
      Width           =   1575
   End
   Begin VB.TextBox lo 
      Height          =   285
      Left            =   2760
      TabIndex        =   2
      Top             =   1320
      Width           =   1575
   End
   Begin VB.Label Label3 
      Caption         =   "passwd"
      Height          =   255
      Left            =   480
      TabIndex        =   3
      Top             =   2160
      Width           =   1575
   End
   Begin VB.Label Label2 
      Caption         =   "login"
      Height          =   495
      Left            =   480
      TabIndex        =   1
      Top             =   1320
      Width           =   1455
   End
   Begin VB.Label Label1 
      Caption         =   "page de connexion"
      Height          =   375
      Left            =   2760
      TabIndex        =   0
      Top             =   240
      Width           =   2055
   End
End
Attribute VB_Name = "Form3"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Private Sub Command1_Click()
Dim x As String
Dim y As String
x = lo.Text
y = pas.Text
If ((x = "bachir") And (y = "passer")) Then
Form2.Show
Unload Me
Else
If ((x = "admin") And (y = "admin")) Then
Form4.Show
Unload Me
Else
MsgBox "user non reconnu", vbCritical, "non"
End If
End If
End Sub
